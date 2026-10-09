<?php

return [
    'navigation_group' => 'Configuración',
    'navigation_label' => 'Cabeceras de seguridad',
    'title' => 'Cabeceras de seguridad',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'Desde qué orígenes tus páginas pueden cargar scripts, estilos, imágenes y frames.',
        ],
        'headers' => [
            'heading' => 'Cabeceras de respuesta',
            'description' => 'Se envían en cada respuesta. Deja un valor vacío para omitir esa cabecera.',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'Solo se envía por HTTPS y fuera de los entornos excluidos.',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'Enviar Content Security Policy',
        ],
        'csp_report_only' => [
            'label' => 'Solo informe',
            'helper' => 'Envía Content-Security-Policy-Report-Only: las infracciones se informan y no se bloquea nada. Úsalo para probar una política nueva.',
        ],
        'csp_directives' => [
            'label' => 'Directivas',
            'key' => 'Directiva',
            'value' => 'Orígenes',
            'helper' => 'Usa {nonce} para el nonce de la petición, p. ej. \'nonce-{nonce}\'.',
        ],
        'csp_report_uri' => [
            'label' => 'Report URI',
            'helper' => 'Endpoint opcional que recibe los informes de infracciones.',
        ],
        'headers' => [
            'label' => 'Cabeceras',
            'key' => 'Cabecera',
            'value' => 'Valor',
        ],
        'hsts_enabled' => [
            'label' => 'Enviar HSTS',
        ],
        'hsts_max_age' => [
            'label' => 'Duración (segundos)',
        ],
        'hsts_include_subdomains' => [
            'label' => 'Incluir subdominios',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => 'Casi irreversible: actívalo solo cuando todos los subdominios usen HTTPS y vayas a enviar el dominio a hstspreload.org.',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => 'Volver a la configuración',
            'heading' => '¿Descartar las cabeceras guardadas?',
            'description' => 'Las respuestas vuelven a usar config/security-headers.php.',
            'done' => 'Cabeceras de seguridad restablecidas',
        ],
    ],
    'validation' => [
        'directive' => '":name" no es un nombre de directiva válido.',
        'header' => '":name" no es un nombre de cabecera válido.',
        'line_breaks' => 'Los valores no pueden contener saltos de línea.',
    ],
];
