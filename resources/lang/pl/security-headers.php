<?php

return [
    'navigation_group' => 'Ustawienia',
    'navigation_label' => 'Nagłówki bezpieczeństwa',
    'title' => 'Nagłówki bezpieczeństwa',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'Z jakich źródeł Twoje strony mogą ładować skrypty, style, obrazy i ramki.',
        ],
        'headers' => [
            'heading' => 'Nagłówki odpowiedzi',
            'description' => 'Wysyłane z każdą odpowiedzią. Pusta wartość pomija nagłówek.',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'Wysyłany tylko przez HTTPS i poza wykluczonymi środowiskami.',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'Wysyłaj Content Security Policy',
        ],
        'csp_report_only' => [
            'label' => 'Tylko raportowanie',
            'helper' => 'Wysyła Content-Security-Policy-Report-Only: naruszenia są raportowane, nic nie jest blokowane. Przydatne do testowania nowej polityki.',
        ],
        'csp_directives' => [
            'label' => 'Dyrektywy',
            'key' => 'Dyrektywa',
            'value' => 'Źródła',
            'helper' => 'Użyj {nonce} dla nonce żądania, np. \'nonce-{nonce}\'.',
        ],
        'csp_report_uri' => [
            'label' => 'Report URI',
            'helper' => 'Opcjonalny endpoint, który odbiera raporty naruszeń.',
        ],
        'headers' => [
            'label' => 'Nagłówki',
            'key' => 'Nagłówek',
            'value' => 'Wartość',
        ],
        'hsts_enabled' => [
            'label' => 'Wysyłaj HSTS',
        ],
        'hsts_max_age' => [
            'label' => 'Ważność (sekundy)',
        ],
        'hsts_include_subdomains' => [
            'label' => 'Uwzględnij subdomeny',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => 'Prawie nieodwracalne: włącz tylko, gdy wszystkie subdomeny działają na HTTPS i zgłosisz domenę do hstspreload.org.',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => 'Przywróć konfigurację',
            'heading' => 'Odrzucić zapisane nagłówki?',
            'description' => 'Odpowiedzi wrócą do config/security-headers.php.',
            'done' => 'Nagłówki bezpieczeństwa przywrócone',
        ],
    ],
    'validation' => [
        'directive' => '„:name” nie jest poprawną nazwą dyrektywy.',
        'header' => '„:name” nie jest poprawną nazwą nagłówka.',
        'line_breaks' => 'Wartości nie mogą zawierać podziałów wiersza.',
    ],
];
