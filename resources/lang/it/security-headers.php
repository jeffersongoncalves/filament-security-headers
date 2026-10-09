<?php

return [
    'navigation_group' => 'Impostazioni',
    'navigation_label' => 'Header di sicurezza',
    'title' => 'Header di sicurezza',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'Da quali origini le tue pagine possono caricare script, stili, immagini e frame.',
        ],
        'headers' => [
            'heading' => 'Header di risposta',
            'description' => 'Inviati con ogni risposta. Lascia un valore vuoto per non inviare l\'header.',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'Inviato solo via HTTPS e fuori dagli ambienti esclusi.',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'Invia una Content Security Policy',
        ],
        'csp_report_only' => [
            'label' => 'Solo report',
            'helper' => 'Invia Content-Security-Policy-Report-Only: le violazioni vengono segnalate e nulla viene bloccato. Usalo per provare una nuova policy.',
        ],
        'csp_directives' => [
            'label' => 'Direttive',
            'key' => 'Direttiva',
            'value' => 'Origini',
            'helper' => 'Usa {nonce} per il nonce della richiesta, es. \'nonce-{nonce}\'.',
        ],
        'csp_report_uri' => [
            'label' => 'Report URI',
            'helper' => 'Endpoint facoltativo che riceve i report delle violazioni.',
        ],
        'headers' => [
            'label' => 'Header',
            'key' => 'Header',
            'value' => 'Valore',
        ],
        'hsts_enabled' => [
            'label' => 'Invia HSTS',
        ],
        'hsts_max_age' => [
            'label' => 'Durata (secondi)',
        ],
        'hsts_include_subdomains' => [
            'label' => 'Includi i sottodomini',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => 'Quasi irreversibile: attivalo solo quando tutti i sottodomini usano HTTPS e invierai il dominio a hstspreload.org.',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => 'Torna alla config',
            'heading' => 'Scartare gli header salvati?',
            'description' => 'Le risposte tornano a usare config/security-headers.php.',
            'done' => 'Header di sicurezza ripristinati',
        ],
    ],
    'validation' => [
        'directive' => '":name" non è un nome di direttiva valido.',
        'header' => '":name" non è un nome di header valido.',
        'line_breaks' => 'I valori non possono contenere interruzioni di riga.',
    ],
];
