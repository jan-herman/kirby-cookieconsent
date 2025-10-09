<?php

use Kirby\Cms\App as Kirby;
use Kirby\Http\Response;
use JanHerman\CookieConsent\Config;

@include_once __DIR__ . '/vendor/autoload.php';

Kirby::plugin('jan-herman/cookieconsent', [
    'options' => [

        // CookieConsent options
        // Root options
        'revision' => 1,
        'root' => 'document.body',
        'autoClearCookies' => true, // Only works when the categories has an autoClear array
        'autoShow' => true,
        'hideFromBots' => true,
        'disablePageInteraction' => false,
        'lazyHtmlGeneration' => true,

        // Block options
        'guiOptions' => [
            'consentModal' => [
                'layout' => 'box',
                'position' => 'bottom right',
                'flipButtons' => false,
                'equalWeightButtons' => false
            ],
            'preferencesModal' => [
                'layout' => 'box',
                // 'position' => 'left',
                'flipButtons' => true,
                'equalWeightButtons' => false
            ]
        ],
        'categories' => [
            'necessary' => [
                'enabled' => true,
                'readOnly' => true
            ],
            'preferences' => [],
            'analytics' => [],
            'marketing' => []
        ],

        // Language options
        'translations' => [
            'en' => require_once(__DIR__ . '/translations/en.php'),
            'cs' => require_once(__DIR__ . '/translations/cs.php'),
        ]
    ],
    'routes' => [
        [
            'pattern' => 'cookieconsent.js',
            'action' => function () {
                $configuration = Config::get();

                $lib_js  = file_get_contents(__DIR__ . '/assets/cookieconsent.js');
                $init_js = file_get_contents(__DIR__ . '/assets/init.js');
                $run_js  = "function run() {CookieConsent.run(" . json_encode($configuration) . ");}";

                $response = $lib_js . $init_js . $run_js;

                return new Response(
                    $response,
                    'application/javascript',
                    200,
                    [
                        'Cache-Control' => 'public, max-age=3600, must-revalidate'
                    ]
                );
            }
        ],
        [
            'method' => 'POST',
            'pattern' => 'ajax/log-cookie-consent',
            'action' => function () {
                $kirby = kirby();

                $request_data = $kirby->request()->data();
                $cookie = $request_data['cookie'];

                // bdump($cookie);

                $ip_address = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
                $anonymized_ip_address = preg_replace(['/\.\d*$/', '/[\da-f]*:[\da-f]*$/'], ['.XXX', 'XXXX:XXXX'], $ip_address);

                // create log data
                $log_data[] = '[' . date('Y-m-d H-i-s') . ']';
                $log_data[] = 'ID: ' . $cookie['consentId'];
                $log_data[] = 'Categories: [' . implode(', ', $cookie['categories']) . ']';
                $log_data[] = 'Revision: ' . $cookie['revision'];
                $log_data[] = 'IP: ' . $anonymized_ip_address;
                $log_data[] = 'URL: ' . $request_data['url'];
                $log_data[] = 'User Agent: ' . $request_data['user_agent'];

                // save it to log file
                $log_path = $kirby->root('logs') . '/cookie-consent';
                $log_filename = date('Y_m') . '.log';

                if (!file_exists($log_path)) {
                    mkdir($log_path, 0777, true);
                }

                file_put_contents($log_path . DIRECTORY_SEPARATOR . $log_filename, implode('  ', $log_data) . PHP_EOL, FILE_APPEND);

                // create response
                $response['type'] = 'success';
                echo json_encode($response);

                die();
            }
        ],
    ],
    'snippets' => [
        'cookieconsent/js'  => __DIR__ . '/snippets/js.php',
        'cookieconsent/css' => __DIR__ . '/snippets/css.php'
    ],
]);
