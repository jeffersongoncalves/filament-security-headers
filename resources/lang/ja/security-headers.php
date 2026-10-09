<?php

return [
    'navigation_group' => '設定',
    'navigation_label' => 'セキュリティヘッダー',
    'title' => 'セキュリティヘッダー',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'ページがスクリプト、スタイル、画像、フレームを読み込めるソース。',
        ],
        'headers' => [
            'heading' => 'レスポンスヘッダー',
            'description' => 'すべてのレスポンスで送信されます。値を空にするとそのヘッダーは送信されません。',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'HTTPS かつ除外された環境以外でのみ送信されます。',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'Content Security Policy を送信',
        ],
        'csp_report_only' => [
            'label' => 'レポートのみ',
            'helper' => 'Content-Security-Policy-Report-Only を送信します。違反は報告されますがブロックはされません。新しいポリシーの試験に使えます。',
        ],
        'csp_directives' => [
            'label' => 'ディレクティブ',
            'key' => 'ディレクティブ',
            'value' => 'ソース',
            'helper' => 'リクエストごとの nonce には {nonce} を使います（例：\'nonce-{nonce}\'）。',
        ],
        'csp_report_uri' => [
            'label' => 'Report URI',
            'helper' => '違反レポートを受け取る任意のエンドポイント。',
        ],
        'headers' => [
            'label' => 'ヘッダー',
            'key' => 'ヘッダー',
            'value' => '値',
        ],
        'hsts_enabled' => [
            'label' => 'HSTS を送信',
        ],
        'hsts_max_age' => [
            'label' => '有効期間（秒）',
        ],
        'hsts_include_subdomains' => [
            'label' => 'サブドメインを含める',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => 'ほぼ元に戻せません。すべてのサブドメインが HTTPS で、ドメインを hstspreload.org に申請する場合のみ有効にしてください。',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => '設定に戻す',
            'heading' => '保存したヘッダーを破棄しますか？',
            'description' => 'レスポンスは config/security-headers.php に戻ります。',
            'done' => 'セキュリティヘッダーを設定に戻しました',
        ],
    ],
    'validation' => [
        'directive' => '「:name」は有効なディレクティブ名ではありません。',
        'header' => '「:name」は有効なヘッダー名ではありません。',
        'line_breaks' => '値に改行は使えません。',
    ],
];
