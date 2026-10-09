<?php

return [
    'navigation_group' => 'सेटिंग्स',
    'navigation_label' => 'सुरक्षा हेडर',
    'title' => 'सुरक्षा हेडर',
    'sections' => [
        'csp' => [
            'heading' => 'Content Security Policy',
            'description' => 'आपके पेज किन स्रोतों से स्क्रिप्ट, स्टाइल, इमेज और फ़्रेम लोड कर सकते हैं।',
        ],
        'headers' => [
            'heading' => 'रिस्पॉन्स हेडर',
            'description' => 'हर रिस्पॉन्स के साथ भेजे जाते हैं। हेडर छोड़ने के लिए मान खाली रखें।',
        ],
        'hsts' => [
            'heading' => 'Strict-Transport-Security (HSTS)',
            'description' => 'केवल HTTPS पर और बाहर रखे गए एनवायरनमेंट के बाहर भेजा जाता है।',
        ],
    ],
    'fields' => [
        'csp_enabled' => [
            'label' => 'Content Security Policy भेजें',
        ],
        'csp_report_only' => [
            'label' => 'केवल रिपोर्ट',
            'helper' => 'Content-Security-Policy-Report-Only भेजता है: उल्लंघन रिपोर्ट होते हैं, कुछ भी ब्लॉक नहीं होता। नई पॉलिसी आज़माने के लिए उपयोग करें।',
        ],
        'csp_directives' => [
            'label' => 'डायरेक्टिव',
            'key' => 'डायरेक्टिव',
            'value' => 'स्रोत',
            'helper' => 'अनुरोध के nonce के लिए {nonce} उपयोग करें, जैसे \'nonce-{nonce}\'।',
        ],
        'csp_report_uri' => [
            'label' => 'Report URI',
            'helper' => 'उल्लंघन रिपोर्ट पाने वाला वैकल्पिक एंडपॉइंट।',
        ],
        'headers' => [
            'label' => 'हेडर',
            'key' => 'हेडर',
            'value' => 'मान',
        ],
        'hsts_enabled' => [
            'label' => 'HSTS भेजें',
        ],
        'hsts_max_age' => [
            'label' => 'अवधि (सेकंड)',
        ],
        'hsts_include_subdomains' => [
            'label' => 'सबडोमेन शामिल करें',
        ],
        'hsts_preload' => [
            'label' => 'Preload',
            'helper' => 'लगभग अपरिवर्तनीय: केवल तब चालू करें जब हर सबडोमेन HTTPS पर हो और आप डोमेन को hstspreload.org पर भेजेंगे।',
        ],
    ],
    'actions' => [
        'reset' => [
            'label' => 'कॉन्फ़िग पर लौटें',
            'heading' => 'सहेजे गए हेडर हटाएँ?',
            'description' => 'रिस्पॉन्स फिर से config/security-headers.php उपयोग करेंगे।',
            'done' => 'सुरक्षा हेडर रीसेट हुए',
        ],
    ],
    'validation' => [
        'directive' => '":name" मान्य डायरेक्टिव नाम नहीं है।',
        'header' => '":name" मान्य हेडर नाम नहीं है।',
        'line_breaks' => 'मानों में लाइन ब्रेक नहीं हो सकते।',
    ],
];
