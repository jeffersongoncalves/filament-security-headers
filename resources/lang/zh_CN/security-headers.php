<?php

return [
    'navigation_group' => '设置',
    'navigation_label' => '安全响应头',
    'title' => '安全响应头',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => '页面可以从哪些来源加载脚本、样式、图片和框架。',
        ],
        'headers' => [
            'heading' => '响应头',
            'description' => '随每个响应发送。值留空则不发送该响应头。',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => '仅通过 HTTPS 且在排除的环境之外发送。',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => '发送 Content Security Policy',
        ],
        'csp_report_only' => [
            'label' => '仅报告',
            'helper' => '发送 Content-Security-Policy-Report-Only：违规会被报告，但不会拦截。适合试用新策略。',
        ],
        'csp_directives' => [
            'label' => '指令',
            'key' => '指令',
            'value' => '来源',
            'helper' => '用 {nonce} 表示请求的 nonce，例如 \'nonce-{nonce}\'。',
        ],
        'csp_report_uri' => [
            'label' => 'Report URI',
            'helper' => '接收违规报告的可选端点。',
        ],
        'headers' => [
            'label' => '响应头',
            'key' => '名称',
            'value' => '值',
        ],
        'hsts_enabled' => [
            'label' => '发送 HSTS',
        ],
        'hsts_max_age' => [
            'label' => '有效期（秒）',
        ],
        'hsts_include_subdomains' => [
            'label' => '包含子域名',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => '几乎不可撤销：仅在所有子域名都使用 HTTPS 且你会把域名提交到 hstspreload.org 时启用。',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => '恢复为配置',
            'heading' => '放弃已保存的响应头？',
            'description' => '响应将重新使用 config/security-headers.php。',
            'done' => '安全响应头已恢复为配置',
        ],
    ],
    'validation' => [
        'directive' => '“:name”不是有效的指令名称。',
        'header' => '“:name”不是有效的响应头名称。',
        'line_breaks' => '值不能包含换行。',
    ],
];
