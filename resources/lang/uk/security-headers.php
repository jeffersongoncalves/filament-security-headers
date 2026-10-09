<?php

return [
    'navigation_group' => 'Налаштування',
    'navigation_label' => 'Заголовки безпеки',
    'title' => 'Заголовки безпеки',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'З яких джерел сторінки можуть завантажувати скрипти, стилі, зображення та фрейми.',
        ],
        'headers' => [
            'heading' => 'Заголовки відповіді',
            'description' => 'Надсилаються з кожною відповіддю. Порожнє значення — заголовок не надсилається.',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'Надсилається лише через HTTPS і поза виключеними середовищами.',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'Надсилати Content Security Policy',
        ],
        'csp_report_only' => [
            'label' => 'Лише звіти',
            'helper' => 'Надсилає Content-Security-Policy-Report-Only: порушення повідомляються, нічого не блокується. Зручно для перевірки нової політики.',
        ],
        'csp_directives' => [
            'label' => 'Директиви',
            'key' => 'Директива',
            'value' => 'Джерела',
            'helper' => '{nonce} — nonce запиту, наприклад \'nonce-{nonce}\'.',
        ],
        'csp_report_uri' => [
            'label' => 'Report URI',
            'helper' => 'Необов’язкова адреса для звітів про порушення.',
        ],
        'headers' => [
            'label' => 'Заголовки',
            'key' => 'Заголовок',
            'value' => 'Значення',
        ],
        'hsts_enabled' => [
            'label' => 'Надсилати HSTS',
        ],
        'hsts_max_age' => [
            'label' => 'Термін (секунди)',
        ],
        'hsts_include_subdomains' => [
            'label' => 'Включно з піддоменами',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => 'Майже незворотно: вмикайте, лише коли всі піддомени працюють через HTTPS і ви подасте домен до hstspreload.org.',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => 'Повернути конфіг',
            'heading' => 'Відкинути збережені заголовки?',
            'description' => 'Відповіді знову використовуватимуть config/security-headers.php.',
            'done' => 'Заголовки безпеки скинуто',
        ],
    ],
    'validation' => [
        'directive' => '«:name» — неприпустима назва директиви.',
        'header' => '«:name» — неприпустима назва заголовка.',
        'line_breaks' => 'Значення не можуть містити переносів рядка.',
    ],
];
