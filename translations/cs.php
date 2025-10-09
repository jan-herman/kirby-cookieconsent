<?php

return [
    'consentModal' => [
        'title' => 'Tato webová stránka používá cookies',
        'description' => 'K personalizaci obsahu a reklam, poskytování funkcí sociálních médií a analýze naší návštěvnosti využíváme soubory cookie. Informace o tom, jak náš web používáte, sdílíme se svými partnery pro sociální média, inzerci a analýzy. Partneři tyto údaje mohou zkombinovat s dalšími informacemi, které jste jim poskytli nebo které získali v důsledku toho, že používáte jejich služby.',
        'acceptAllBtn' => 'Povolit vše',
        'acceptNecessaryBtn' => 'Odmítnout',
        'showPreferencesBtn' => 'Detaily'
    ],
    'preferencesModal' => [
        'title' => 'Nastavení cookies',
        'acceptAllBtn' => 'Povolit vše',
        'acceptNecessaryBtn' => 'Odmítnout',
        'savePreferencesBtn' => 'Povolit vybrané',
        'closeIconLabel' => 'Zavřít',
        'sections' => [
            [
                'title' => 'Co jsou to cookies?',
                'description' => 'Soubory cookie jsou malé textové soubory využívané internetovými stránkami k zefektivnění jejich fungování a zlepšení uživatelského zážitku. V souladu s příslušnými předpisy na ochranu osobních údajů jsme oprávnění ukládat do Vašeho zařízení tzv. technické soubory cookies, tj. soubory cookies nezbytně nutné pro provoz této Stránky. K ukládání dalších druhů cookies potřebujeme Váš souhlas. Svoje nastavení můžete kdykoliv změnit prostřednictvím odkazu v patičce webu.'
            ],
            [
                'title' => 'Nutné',
                'description' => 'Nutné cookies pomáhají, aby byla webová stránka použitelná tak, že umožní základní funkce jako navigace stránky a přístup k zabezpečeným sekcím webové stránky. Webová stránka nemůže správně fungovat bez těchto cookies.',
                'linkedCategory' => 'necessary'
            ],
            [
                'title' => 'Preferenční',
                'description' => 'Preferenční cookies umožňují, aby si webová stránka zapamatovala informace, které mění, jak se webová stránka chová nebo jak vypadá. Je to například preferovaný jazyk nebo region, kde se nacházíte.',
                'linkedCategory' => 'preferences',
            ],
            [
                'title' => 'Statistické',
                'description' => 'Statistické cookies pomáhají majitelům webových stránek, aby porozuměli, jak návštěvníci používají webové stránky. Anonymně sbírají a sdělují informace.',
                'linkedCategory' => 'analytics',
            ],
            [
                'title' => 'Marketingové',
                'description' => 'Marketingové cookies jsou používány pro sledování návštěvníků na webových stránkách. Záměrem je zobrazit reklamu, která je relevantní a zajímavá pro jednotlivého uživatele a tímto hodnotnější pro vydavatele a inzerenty třetích stran.',
                'linkedCategory' => 'marketing',
            ],
            [
                'title' => 'Více informací',
                'description' => 'Máte-li jakékoliv dotazy týkající se našich zásad používání souborů cookie a vašich voleb, prosím <a class="cc__link" href="/kontakt">kontaktujte nás</a>.'
            ]
        ]
    ],
];
