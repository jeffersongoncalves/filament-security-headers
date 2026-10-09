<?php

return [
    'navigation_group' => 'Einstellungen',
    'navigation_label' => 'Sicherheits-Header',
    'title' => 'Sicherheits-Header',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'Von welchen Quellen Ihre Seiten Skripte, Styles, Bilder und Frames laden dürfen.',
        ],
        'headers' => [
            'heading' => 'Antwort-Header',
            'description' => 'Werden mit jeder Antwort gesendet. Leerer Wert = Header wird nicht gesendet.',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'Nur über HTTPS und außerhalb der ausgeschlossenen Umgebungen gesendet.',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'Content Security Policy senden',
        ],
        'csp_report_only' => [
            'label' => 'Nur melden',
            'helper' => 'Sendet Content-Security-Policy-Report-Only: Verstöße werden gemeldet, nichts wird blockiert. Ideal zum Testen einer neuen Policy.',
        ],
        'csp_directives' => [
            'label' => 'Direktiven',
            'key' => 'Direktive',
            'value' => 'Quellen',
            'helper' => '{nonce} steht für die Nonce der Anfrage, z. B. \'nonce-{nonce}\'.',
        ],
        'csp_report_uri' => [
            'label' => 'Report-URI',
            'helper' => 'Optionaler Endpunkt, der die Verstoßberichte empfängt.',
        ],
        'headers' => [
            'label' => 'Header',
            'key' => 'Header',
            'value' => 'Wert',
        ],
        'hsts_enabled' => [
            'label' => 'HSTS senden',
        ],
        'hsts_max_age' => [
            'label' => 'Gültigkeit (Sekunden)',
        ],
        'hsts_include_subdomains' => [
            'label' => 'Subdomains einschließen',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => 'Kaum umkehrbar: nur aktivieren, wenn alle Subdomains HTTPS liefern und Sie die Domain bei hstspreload.org einreichen.',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => 'Auf Konfiguration zurücksetzen',
            'heading' => 'Gespeicherte Header verwerfen?',
            'description' => 'Antworten nutzen wieder config/security-headers.php.',
            'done' => 'Sicherheits-Header zurückgesetzt',
        ],
    ],
    'validation' => [
        'directive' => '„:name“ ist kein gültiger Direktivenname.',
        'header' => '„:name“ ist kein gültiger Header-Name.',
        'line_breaks' => 'Werte dürfen keine Zeilenumbrüche enthalten.',
    ],
];
