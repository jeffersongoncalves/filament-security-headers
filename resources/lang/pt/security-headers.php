<?php

return [
    'navigation_group' => 'Definições',
    'navigation_label' => 'Cabeçalhos de segurança',
    'title' => 'Cabeçalhos de segurança',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'De que origens as suas páginas podem carregar scripts, estilos, imagens e frames.',
        ],
        'headers' => [
            'heading' => 'Cabeçalhos da resposta',
            'description' => 'Enviados em todas as respostas. Deixe um valor vazio para não enviar o cabeçalho.',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'Enviado apenas por HTTPS e fora dos ambientes excluídos.',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'Enviar Content Security Policy',
        ],
        'csp_report_only' => [
            'label' => 'Apenas relatório',
            'helper' => 'Envia Content-Security-Policy-Report-Only: as violações são reportadas e nada é bloqueado. Use para testar uma política nova.',
        ],
        'csp_directives' => [
            'label' => 'Diretivas',
            'key' => 'Diretiva',
            'value' => 'Origens',
            'helper' => 'Use {nonce} para o nonce do pedido, ex.: \'nonce-{nonce}\'.',
        ],
        'csp_report_uri' => [
            'label' => 'Report URI',
            'helper' => 'Endpoint opcional que recebe os relatórios de violação.',
        ],
        'headers' => [
            'label' => 'Cabeçalhos',
            'key' => 'Cabeçalho',
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
            'helper' => 'Quase irreversível: ative apenas quando todos os subdomínios servirem HTTPS e for submeter o domínio em hstspreload.org.',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => 'Repor a configuração',
            'heading' => 'Descartar os cabeçalhos guardados?',
            'description' => 'As respostas voltam a usar config/security-headers.php.',
            'done' => 'Cabeçalhos de segurança repostos',
        ],
    ],
    'validation' => [
        'directive' => '":name" não é um nome de diretiva válido.',
        'header' => '":name" não é um nome de cabeçalho válido.',
        'line_breaks' => 'Os valores não podem ter quebras de linha.',
    ],
];
