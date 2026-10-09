<?php

return [
    'navigation_group' => 'Parametrlər',
    'navigation_label' => 'Təhlükəsizlik başlıqları',
    'title' => 'Təhlükəsizlik başlıqları',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'Səhifələrin skript, üslub, şəkil və çərçivələri hansı mənbələrdən yükləyə biləcəyi.',
        ],
        'headers' => [
            'heading' => 'Cavab başlıqları',
            'description' => 'Hər cavabla göndərilir. Başlığı göndərməmək üçün dəyəri boş buraxın.',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'Yalnız HTTPS üzərindən və istisna edilən mühitlərdən kənarda göndərilir.',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'Content Security Policy göndər',
        ],
        'csp_report_only' => [
            'label' => 'Yalnız hesabat',
            'helper' => 'Content-Security-Policy-Report-Only göndərir: pozuntular bildirilir, heç nə bloklanmır. Yeni siyasəti sınamaq üçün istifadə edin.',
        ],
        'csp_directives' => [
            'label' => 'Direktivlər',
            'key' => 'Direktiv',
            'value' => 'Mənbələr',
            'helper' => 'Sorğunun nonce-u üçün {nonce} istifadə edin, məs. \'nonce-{nonce}\'.',
        ],
        'csp_report_uri' => [
            'label' => 'Report URI',
            'helper' => 'Pozuntu hesabatlarını qəbul edən istəyə bağlı ünvan.',
        ],
        'headers' => [
            'label' => 'Başlıqlar',
            'key' => 'Başlıq',
            'value' => 'Dəyər',
        ],
        'hsts_enabled' => [
            'label' => 'HSTS göndər',
        ],
        'hsts_max_age' => [
            'label' => 'Müddət (saniyə)',
        ],
        'hsts_include_subdomains' => [
            'label' => 'Alt domenləri daxil et',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => 'Demək olar ki, geri qaytarılmır: yalnız bütün alt domenlər HTTPS işlədəndə və domeni hstspreload.org-a göndərəcəyiniz zaman aktivləşdirin.',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => 'Konfiqurasiyaya qayıt',
            'heading' => 'Saxlanılan başlıqlar ləğv edilsin?',
            'description' => 'Cavablar yenidən config/security-headers.php istifadə edir.',
            'done' => 'Təhlükəsizlik başlıqları sıfırlandı',
        ],
    ],
    'validation' => [
        'directive' => '":name" etibarlı direktiv adı deyil.',
        'header' => '":name" etibarlı başlıq adı deyil.',
        'line_breaks' => 'Dəyərlərdə sətir keçidi ola bilməz.',
    ],
];
