<?php

return [
    'navigation_group' => 'Ayarlar',
    'navigation_label' => 'Güvenlik başlıkları',
    'title' => 'Güvenlik başlıkları',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'Sayfalarınızın betik, stil, görsel ve çerçeveleri hangi kaynaklardan yükleyebileceği.',
        ],
        'headers' => [
            'heading' => 'Yanıt başlıkları',
            'description' => 'Her yanıtla gönderilir. Başlığı atlamak için değeri boş bırakın.',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'Yalnızca HTTPS üzerinden ve hariç tutulan ortamların dışında gönderilir.',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'Content Security Policy gönder',
        ],
        'csp_report_only' => [
            'label' => 'Yalnızca rapor',
            'helper' => 'Content-Security-Policy-Report-Only gönderir: ihlaller raporlanır, hiçbir şey engellenmez. Yeni bir politikayı denemek için kullanın.',
        ],
        'csp_directives' => [
            'label' => 'Yönergeler',
            'key' => 'Yönerge',
            'value' => 'Kaynaklar',
            'helper' => 'İstek nonce\'u için {nonce} kullanın, örn. \'nonce-{nonce}\'.',
        ],
        'csp_report_uri' => [
            'label' => 'Report URI',
            'helper' => 'İhlal raporlarını alan isteğe bağlı uç nokta.',
        ],
        'headers' => [
            'label' => 'Başlıklar',
            'key' => 'Başlık',
            'value' => 'Değer',
        ],
        'hsts_enabled' => [
            'label' => 'HSTS gönder',
        ],
        'hsts_max_age' => [
            'label' => 'Süre (saniye)',
        ],
        'hsts_include_subdomains' => [
            'label' => 'Alt alan adlarını dahil et',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => 'Neredeyse geri alınamaz: yalnızca tüm alt alan adları HTTPS kullanıyorsa ve alan adını hstspreload.org\'a göndereceksenz etkinleştirin.',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => 'Yapılandırmaya dön',
            'heading' => 'Kaydedilen başlıklar atılsın mı?',
            'description' => 'Yanıtlar yeniden config/security-headers.php kullanır.',
            'done' => 'Güvenlik başlıkları sıfırlandı',
        ],
    ],
    'validation' => [
        'directive' => '":name" geçerli bir yönerge adı değil.',
        'header' => '":name" geçerli bir başlık adı değil.',
        'line_breaks' => 'Değerler satır sonu içeremez.',
    ],
];
