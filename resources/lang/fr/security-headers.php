<?php

return [
    'navigation_group' => 'Paramètres',
    'navigation_label' => 'En-têtes de sécurité',
    'title' => 'En-têtes de sécurité',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'Les origines depuis lesquelles vos pages peuvent charger scripts, styles, images et frames.',
        ],
        'headers' => [
            'heading' => 'En-têtes de réponse',
            'description' => 'Envoyés avec chaque réponse. Laissez une valeur vide pour ne pas envoyer l\'en-tête.',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'Envoyé uniquement en HTTPS et hors des environnements exclus.',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'Envoyer une Content Security Policy',
        ],
        'csp_report_only' => [
            'label' => 'Rapport uniquement',
            'helper' => 'Envoie Content-Security-Policy-Report-Only : les violations sont signalées, rien n\'est bloqué. Idéal pour tester une nouvelle politique.',
        ],
        'csp_directives' => [
            'label' => 'Directives',
            'key' => 'Directive',
            'value' => 'Sources',
            'helper' => 'Utilisez {nonce} pour le nonce de la requête, ex. : \'nonce-{nonce}\'.',
        ],
        'csp_report_uri' => [
            'label' => 'Report URI',
            'helper' => 'Point de terminaison facultatif qui reçoit les rapports de violation.',
        ],
        'headers' => [
            'label' => 'En-têtes',
            'key' => 'En-tête',
            'value' => 'Valeur',
        ],
        'hsts_enabled' => [
            'label' => 'Envoyer HSTS',
        ],
        'hsts_max_age' => [
            'label' => 'Durée (secondes)',
        ],
        'hsts_include_subdomains' => [
            'label' => 'Inclure les sous-domaines',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => 'Presque irréversible : à activer seulement si tous les sous-domaines sont en HTTPS et que vous soumettrez le domaine à hstspreload.org.',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => 'Revenir à la config',
            'heading' => 'Abandonner les en-têtes enregistrés ?',
            'description' => 'Les réponses reviennent à config/security-headers.php.',
            'done' => 'En-têtes de sécurité réinitialisés',
        ],
    ],
    'validation' => [
        'directive' => '« :name » n\'est pas un nom de directive valide.',
        'header' => '« :name » n\'est pas un nom d\'en-tête valide.',
        'line_breaks' => 'Les valeurs ne peuvent pas contenir de sauts de ligne.',
    ],
];
