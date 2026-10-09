<?php

return [
    'navigation_group' => 'Настройки',
    'navigation_label' => 'Заголовки безопасности',
    'title' => 'Заголовки безопасности',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'Из каких источников страницы могут загружать скрипты, стили, изображения и фреймы.',
        ],
        'headers' => [
            'heading' => 'Заголовки ответа',
            'description' => 'Отправляются с каждым ответом. Пустое значение — заголовок не отправляется.',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'Отправляется только по HTTPS и вне исключённых окружений.',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'Отправлять Content Security Policy',
        ],
        'csp_report_only' => [
            'label' => 'Только отчёты',
            'helper' => 'Отправляет Content-Security-Policy-Report-Only: нарушения сообщаются, но ничего не блокируется. Удобно для проверки новой политики.',
        ],
        'csp_directives' => [
            'label' => 'Директивы',
            'key' => 'Директива',
            'value' => 'Источники',
            'helper' => '{nonce} — nonce запроса, например \'nonce-{nonce}\'.',
        ],
        'csp_report_uri' => [
            'label' => 'Report URI',
            'helper' => 'Необязательный адрес для отчётов о нарушениях.',
        ],
        'headers' => [
            'label' => 'Заголовки',
            'key' => 'Заголовок',
            'value' => 'Значение',
        ],
        'hsts_enabled' => [
            'label' => 'Отправлять HSTS',
        ],
        'hsts_max_age' => [
            'label' => 'Срок (секунды)',
        ],
        'hsts_include_subdomains' => [
            'label' => 'Включая поддомены',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => 'Почти необратимо: включайте, только если все поддомены работают по HTTPS и вы подадите домен в hstspreload.org.',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => 'Вернуть конфиг',
            'heading' => 'Отбросить сохранённые заголовки?',
            'description' => 'Ответы снова будут использовать config/security-headers.php.',
            'done' => 'Заголовки безопасности сброшены',
        ],
    ],
    'validation' => [
        'directive' => '«:name» — недопустимое имя директивы.',
        'header' => '«:name» — недопустимое имя заголовка.',
        'line_breaks' => 'Значения не могут содержать переводы строк.',
    ],
];
