<?php

return [
    'navigation_group' => 'الإعدادات',
    'navigation_label' => 'ترويسات الأمان',
    'title' => 'ترويسات الأمان',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'المصادر التي يمكن لصفحاتك تحميل السكربتات والأنماط والصور والإطارات منها.',
        ],
        'headers' => [
            'heading' => 'ترويسات الاستجابة',
            'description' => 'تُرسل مع كل استجابة. اترك القيمة فارغة لتخطي الترويسة.',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'تُرسل عبر HTTPS فقط وخارج البيئات المستثناة.',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'إرسال Content Security Policy',
        ],
        'csp_report_only' => [
            'label' => 'إبلاغ فقط',
            'helper' => 'يرسل Content-Security-Policy-Report-Only: يُبلَّغ عن المخالفات ولا يُحظر شيء. استخدمه لتجربة سياسة جديدة.',
        ],
        'csp_directives' => [
            'label' => 'التوجيهات',
            'key' => 'التوجيه',
            'value' => 'المصادر',
            'helper' => 'استخدم {nonce} لقيمة nonce الخاصة بالطلب، مثل \'nonce-{nonce}\'.',
        ],
        'csp_report_uri' => [
            'label' => 'Report URI',
            'helper' => 'عنوان اختياري يستقبل تقارير المخالفات.',
        ],
        'headers' => [
            'label' => 'الترويسات',
            'key' => 'الترويسة',
            'value' => 'القيمة',
        ],
        'hsts_enabled' => [
            'label' => 'إرسال HSTS',
        ],
        'hsts_max_age' => [
            'label' => 'المدة (بالثواني)',
        ],
        'hsts_include_subdomains' => [
            'label' => 'تضمين النطاقات الفرعية',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => 'شبه نهائي: فعّله فقط عندما تعمل كل النطاقات الفرعية عبر HTTPS وستقدّم النطاق إلى hstspreload.org.',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => 'العودة إلى الإعدادات',
            'heading' => 'تجاهل الترويسات المحفوظة؟',
            'description' => 'تعود الاستجابات إلى config/security-headers.php.',
            'done' => 'أُعيدت ترويسات الأمان إلى الإعدادات',
        ],
    ],
    'validation' => [
        'directive' => '":name" ليس اسم توجيه صالحًا.',
        'header' => '":name" ليس اسم ترويسة صالحًا.',
        'line_breaks' => 'لا يمكن أن تحتوي القيم على فواصل أسطر.',
    ],
];
