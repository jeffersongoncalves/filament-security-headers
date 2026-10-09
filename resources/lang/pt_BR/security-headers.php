<?php

return [
    'navigation_group' => 'Configurações',
    'navigation_label' => 'Headers de segurança',
    'title' => 'Headers de segurança',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'De quais origens suas páginas podem carregar scripts, estilos, imagens e frames.',
        ],
        'headers' => [
            'heading' => 'Headers da resposta',
            'description' => 'Enviados em toda resposta. Deixe um valor vazio para não enviar o header.',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'Enviado só via HTTPS e fora dos ambientes excluídos.',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'Enviar Content Security Policy',
        ],
        'csp_report_only' => [
            'label' => 'Somente relatório',
            'helper' => 'Envia Content-Security-Policy-Report-Only: as violações são reportadas e nada é bloqueado. Use para testar uma política nova.',
        ],
        'csp_directives' => [
            'label' => 'Diretivas',
            'key' => 'Diretiva',
            'value' => 'Origens',
            'helper' => 'Use {nonce} para o nonce da requisição, ex.: \'nonce-{nonce}\'.',
        ],
        'csp_report_uri' => [
            'label' => 'Report URI',
            'helper' => 'Endpoint opcional que recebe os relatórios de violação.',
        ],
        'headers' => [
            'label' => 'Headers',
            'key' => 'Header',
            'value' => 'Valor',
        ],
        'hsts_enabled' => [
            'label' => 'Enviar HSTS',
        ],
        'hsts_max_age' => [
            'label' => 'Validade (segundos)',
        ],
        'hsts_include_subdomains' => [
            'label' => 'Incluir subdomínios',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => 'Quase irreversível: só ative quando todos os subdomínios servirem HTTPS e você for enviar o domínio ao hstspreload.org.',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => 'Voltar para a config',
            'heading' => 'Descartar os headers salvos?',
            'description' => 'As respostas voltam a usar config/security-headers.php.',
            'done' => 'Headers de segurança voltaram para a config',
        ],
    ],
    'validation' => [
        'directive' => '":name" não é um nome de diretiva válido.',
        'header' => '":name" não é um nome de header válido.',
        'line_breaks' => 'Os valores não podem ter quebras de linha.',
    ],
];
