<?php

return [
    'navigation_group' => 'Settings',
    'navigation_label' => 'Security headers',
    'title' => 'Security headers',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'Which sources your pages may load scripts, styles, images and frames from.',
        ],
        'headers' => [
            'heading' => 'Response headers',
            'description' => 'Sent on every response. Leave a value empty to skip that header.',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'Only sent over HTTPS and outside the excluded environments.',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'Send a Content Security Policy',
        ],
        'csp_report_only' => [
            'label' => 'Report-only',
            'helper' => 'Sends Content-Security-Policy-Report-Only: violations are reported, nothing is blocked. Use it to try a new policy.',
        ],
        'csp_directives' => [
            'label' => 'Directives',
            'key' => 'Directive',
            'value' => 'Sources',
            'helper' => 'Use {nonce} for the per-request nonce, e.g. \'nonce-{nonce}\'.',
        ],
        'csp_report_uri' => [
            'label' => 'Report URI',
            'helper' => 'Optional endpoint that receives the violation reports.',
        ],
        'headers' => [
            'label' => 'Headers',
            'key' => 'Header',
            'value' => 'Value',
        ],
        'hsts_enabled' => [
            'label' => 'Send HSTS',
        ],
        'hsts_max_age' => [
            'label' => 'Max age (seconds)',
        ],
        'hsts_include_subdomains' => [
            'label' => 'Include subdomains',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => 'Close to irreversible: only enable it when every subdomain serves HTTPS and you will submit the domain to hstspreload.org.',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => 'Reset to config',
            'heading' => 'Discard the saved headers?',
            'description' => 'Responses go back to config/security-headers.php.',
            'done' => 'Security headers reset to the config',
        ],
    ],
    'validation' => [
        'directive' => '":name" is not a valid directive name.',
        'header' => '":name" is not a valid header name.',
        'line_breaks' => 'Values cannot contain line breaks.',
    ],
];
