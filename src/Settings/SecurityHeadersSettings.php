<?php

namespace JeffersonGoncalves\Filament\SecurityHeaders\Settings;

use Spatie\LaravelSettings\Settings;

class SecurityHeadersSettings extends Settings
{
    /** False until the page is saved: the app's config/security-headers.php applies. */
    public bool $customized;

    /** @phpstan-var array<string, string|null> */
    public array $headers;

    public bool $csp_enabled;

    public bool $csp_report_only;

    /** @phpstan-var array<string, string|null> */
    public array $csp_directives;

    public ?string $csp_report_uri;

    public bool $hsts_enabled;

    public int $hsts_max_age;

    public bool $hsts_include_subdomains;

    public bool $hsts_preload;

    public static function group(): string
    {
        return 'security_headers';
    }
}
