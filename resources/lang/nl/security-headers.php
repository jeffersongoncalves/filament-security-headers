<?php

return [
    'navigation_group' => 'Instellingen',
    'navigation_label' => 'Beveiligingsheaders',
    'title' => 'Beveiligingsheaders',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'Van welke bronnen je pagina\'s scripts, stijlen, afbeeldingen en frames mogen laden.',
        ],
        'headers' => [
            'heading' => 'Response-headers',
            'description' => 'Bij elke response verstuurd. Laat een waarde leeg om de header over te slaan.',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'Alleen via HTTPS en buiten de uitgesloten omgevingen verstuurd.',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'Content Security Policy versturen',
        ],
        'csp_report_only' => [
            'label' => 'Alleen rapporteren',
            'helper' => 'Verstuurt Content-Security-Policy-Report-Only: overtredingen worden gemeld, er wordt niets geblokkeerd. Handig om een nieuwe policy te testen.',
        ],
        'csp_directives' => [
            'label' => 'Directives',
            'key' => 'Directive',
            'value' => 'Bronnen',
            'helper' => 'Gebruik {nonce} voor de nonce van het verzoek, bijv. \'nonce-{nonce}\'.',
        ],
        'csp_report_uri' => [
            'label' => 'Report-URI',
            'helper' => 'Optioneel endpoint dat de overtredingsrapporten ontvangt.',
        ],
        'headers' => [
            'label' => 'Headers',
            'key' => 'Header',
            'value' => 'Waarde',
        ],
        'hsts_enabled' => [
            'label' => 'HSTS versturen',
        ],
        'hsts_max_age' => [
            'label' => 'Geldigheid (seconden)',
        ],
        'hsts_include_subdomains' => [
            'label' => 'Subdomeinen meenemen',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => 'Nauwelijks terug te draaien: alleen inschakelen als alle subdomeinen HTTPS gebruiken en je het domein bij hstspreload.org aanmeldt.',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => 'Terug naar de config',
            'heading' => 'Opgeslagen headers verwerpen?',
            'description' => 'Responses gebruiken weer config/security-headers.php.',
            'done' => 'Beveiligingsheaders teruggezet',
        ],
    ],
    'validation' => [
        'directive' => '":name" is geen geldige directivenaam.',
        'header' => '":name" is geen geldige headernaam.',
        'line_breaks' => 'Waarden mogen geen regeleinden bevatten.',
    ],
];
