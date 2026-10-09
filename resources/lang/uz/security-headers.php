<?php

return [
    'navigation_group' => 'Sozlamalar',
    'navigation_label' => 'Xavfsizlik sarlavhalari',
    'title' => 'Xavfsizlik sarlavhalari',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'Sahifalar skript, uslub, rasm va freymlarni qaysi manbalardan yuklashi mumkin.',
        ],
        'headers' => [
            'heading' => 'Javob sarlavhalari',
            'description' => 'Har bir javob bilan yuboriladi. Sarlavhani yubormaslik uchun qiymatni bo‘sh qoldiring.',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'Faqat HTTPS orqali va istisno qilingan muhitlardan tashqarida yuboriladi.',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'Content Security Policy yuborish',
        ],
        'csp_report_only' => [
            'label' => 'Faqat hisobot',
            'helper' => 'Content-Security-Policy-Report-Only yuboradi: buzilishlar xabar qilinadi, hech narsa bloklanmaydi. Yangi siyosatni sinash uchun qulay.',
        ],
        'csp_directives' => [
            'label' => 'Direktivalar',
            'key' => 'Direktiva',
            'value' => 'Manbalar',
            'helper' => 'So‘rov nonce’i uchun {nonce} dan foydalaning, masalan \'nonce-{nonce}\'.',
        ],
        'csp_report_uri' => [
            'label' => 'Report URI',
            'helper' => 'Buzilish hisobotlarini qabul qiladigan ixtiyoriy manzil.',
        ],
        'headers' => [
            'label' => 'Sarlavhalar',
            'key' => 'Sarlavha',
            'value' => 'Qiymat',
        ],
        'hsts_enabled' => [
            'label' => 'HSTS yuborish',
        ],
        'hsts_max_age' => [
            'label' => 'Muddat (soniya)',
        ],
        'hsts_include_subdomains' => [
            'label' => 'Subdomenlarni qo‘shish',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => 'Deyarli qaytarib bo‘lmaydi: faqat barcha subdomenlar HTTPS ishlatganda va domenni hstspreload.org ga yuborsangiz yoqing.',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => 'Konfiguratsiyaga qaytish',
            'heading' => 'Saqlangan sarlavhalar bekor qilinsinmi?',
            'description' => 'Javoblar yana config/security-headers.php dan foydalanadi.',
            'done' => 'Xavfsizlik sarlavhalari tiklandi',
        ],
    ],
    'validation' => [
        'directive' => '":name" yaroqli direktiva nomi emas.',
        'header' => '":name" yaroqli sarlavha nomi emas.',
        'line_breaks' => 'Qiymatlarda qator uzilishi bo‘lishi mumkin emas.',
    ],
];
