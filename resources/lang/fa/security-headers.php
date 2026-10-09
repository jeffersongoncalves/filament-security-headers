<?php

return [
    'navigation_group' => 'تنظیمات',
    'navigation_label' => 'هدرهای امنیتی',
    'title' => 'هدرهای امنیتی',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'صفحه‌ها از چه منابعی می‌توانند اسکریپت، استایل، تصویر و فریم بارگذاری کنند.',
        ],
        'headers' => [
            'heading' => 'هدرهای پاسخ',
            'description' => 'با هر پاسخ ارسال می‌شوند. برای ارسال نکردن هدر مقدار را خالی بگذارید.',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'فقط از طریق HTTPS و خارج از محیط‌های مستثنا ارسال می‌شود.',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'ارسال Content Security Policy',
        ],
        'csp_report_only' => [
            'label' => 'فقط گزارش',
            'helper' => 'Content-Security-Policy-Report-Only را می‌فرستد: تخلف‌ها گزارش می‌شوند و چیزی مسدود نمی‌شود. برای آزمایش یک سیاست جدید مناسب است.',
        ],
        'csp_directives' => [
            'label' => 'دستورها',
            'key' => 'دستور',
            'value' => 'منابع',
            'helper' => 'برای nonce درخواست از {nonce} استفاده کنید، مثلاً \'nonce-{nonce}\'.',
        ],
        'csp_report_uri' => [
            'label' => 'Report URI',
            'helper' => 'نشانی اختیاری که گزارش تخلف‌ها را دریافت می‌کند.',
        ],
        'headers' => [
            'label' => 'هدرها',
            'key' => 'هدر',
            'value' => 'مقدار',
        ],
        'hsts_enabled' => [
            'label' => 'ارسال HSTS',
        ],
        'hsts_max_age' => [
            'label' => 'مدت (ثانیه)',
        ],
        'hsts_include_subdomains' => [
            'label' => 'شامل زیردامنه‌ها',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => 'تقریباً برگشت‌ناپذیر: فقط وقتی فعال کنید که همه زیردامنه‌ها HTTPS باشند و دامنه را به hstspreload.org بفرستید.',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => 'بازگشت به پیکربندی',
            'heading' => 'هدرهای ذخیره‌شده کنار گذاشته شوند؟',
            'description' => 'پاسخ‌ها دوباره از config/security-headers.php استفاده می‌کنند.',
            'done' => 'هدرهای امنیتی بازنشانی شدند',
        ],
    ],
    'validation' => [
        'directive' => '":name" نام دستور معتبری نیست.',
        'header' => '":name" نام هدر معتبری نیست.',
        'line_breaks' => 'مقدارها نمی‌توانند شکست خط داشته باشند.',
    ],
];
