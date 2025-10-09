<?php

return [
    'consentModal' => [
        'title' => 'This website uses cookies',
        'description' => 'We use cookies to personalise content and ads, to provide social media features and to analyse our traffic. We also share information about your use of our site with our social media, advertising and analytics partners who may combine it with other information that you’ve provided to them or that they’ve collected from your use of their services.',
        'acceptAllBtn' => 'Allow all',
        'acceptNecessaryBtn' => 'Deny',
        'showPreferencesBtn' => 'Customize'
    ],
    'preferencesModal' => [
        'title' => 'Cookie preferences',
        'acceptAllBtn' => 'Allow all',
        'acceptNecessaryBtn' => 'Deny',
        'savePreferencesBtn' => 'Allow selection',
        'closeIconLabel' => 'Close',
        'sections' => [
            [
                'title' => 'What are cookies?',
                'description' => 'Cookies are small text files that can be used by websites to make a user\'s experience more efficient. The law states that we can store cookies on your device if they are strictly necessary for the operation of this site. For all other types of cookies we need your permission. You can at any time change or withdraw your consent using the link in the footer of this website.'
            ],
            [
                'title' => 'Necessary',
                'description' => 'Necessary cookies help make a website usable by enabling basic functions like page navigation and access to secure areas of the website. The website cannot function properly without these cookies.',
                'linkedCategory' => 'necessary'
            ],
            [
                'title' => 'Preferences',
                'description' => 'Preference cookies enable a website to remember information that changes the way the website behaves or looks, like your preferred language or the region that you are in.',
                'linkedCategory' => 'preferences',
            ],
            [
                'title' => 'Statistics',
                'description' => 'Statistic cookies help website owners to understand how visitors interact with websites by collecting and reporting information anonymously.',
                'linkedCategory' => 'analytics',
            ],
            [
                'title' => 'Marketing',
                'description' => 'Marketing cookies are used to track visitors across websites. The intention is to display ads that are relevant and engaging for the individual user and thereby more valuable for publishers and third party advertisers.',
                'linkedCategory' => 'marketing',
            ],
            [
                'title' => 'More information',
                'description' => 'For any queries in relation to our policy on cookies and your choices, please <a class="cc__link" href="/contact">contact us</a>.'
            ]
        ]
    ],
];
