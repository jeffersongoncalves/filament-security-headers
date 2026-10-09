<?php

namespace JeffersonGoncalves\Filament\SecurityHeaders;

use Illuminate\Database\QueryException;
use JeffersonGoncalves\Filament\SecurityHeaders\Settings\SecurityHeadersSettings;
use Spatie\LaravelSettings\Exceptions\MissingSettings;

/**
 * Bridges the saved settings and config/security-headers.php, which the laravel-security-headers middleware reads.
 */
final class SecurityHeadersOverrides
{
    private const KEYS = [
        'security-headers.headers',
        'security-headers.csp.enabled',
        'security-headers.csp.report-only',
        'security-headers.csp.directives',
        'security-headers.csp.report-uri',
        'security-headers.hsts.enabled',
        'security-headers.hsts.max-age',
        'security-headers.hsts.include-subdomains',
        'security-headers.hsts.preload',
    ];

    /** @var array<string, mixed>|null */
    private static ?array $baseline = null;

    /**
     * The app's own config values, captured before the first override.
     *
     * @return array<string, mixed>
     */
    public static function baseline(): array
    {
        if (self::$baseline === null) {
            self::$baseline = [];
            foreach (self::KEYS as $key) {
                self::$baseline[$key] = config($key);
            }
        }

        return self::$baseline;
    }

    /**
     * Settings-shaped values from the app config (what the page shows while nothing is saved).
     *
     * @return array<string, mixed>
     */
    public static function defaults(): array
    {
        $config = self::baseline();
        $strings = fn (mixed $map): array => array_map(
            fn (mixed $value): string => is_array($value) ? implode(' ', $value) : (string) ($value ?? ''),
            (array) $map,
        );

        return [
            'customized' => false,
            'headers' => $strings($config['security-headers.headers']),
            'csp_enabled' => (bool) ($config['security-headers.csp.enabled'] ?? true),
            'csp_report_only' => (bool) ($config['security-headers.csp.report-only'] ?? false),
            'csp_directives' => $strings($config['security-headers.csp.directives']),
            'csp_report_uri' => filled($config['security-headers.csp.report-uri']) ? (string) $config['security-headers.csp.report-uri'] : null,
            'hsts_enabled' => (bool) ($config['security-headers.hsts.enabled'] ?? true),
            'hsts_max_age' => (int) ($config['security-headers.hsts.max-age'] ?? 31536000),
            'hsts_include_subdomains' => (bool) ($config['security-headers.hsts.include-subdomains'] ?? true),
            'hsts_preload' => (bool) ($config['security-headers.hsts.preload'] ?? false),
        ];
    }

    /** Put the saved headers over the config, or the config back when nothing is saved. */
    public static function apply(): void
    {
        self::baseline();

        try {
            $settings = app(SecurityHeadersSettings::class);
            $customized = $settings->customized;
        } catch (QueryException|MissingSettings) {
            return; // settings not migrated yet: keep the config
        }

        if (! $customized) {
            config(self::baseline());

            return;
        }

        config([
            'security-headers.headers' => array_map(fn (?string $value): ?string => blank($value) ? null : self::clean($value), $settings->headers),
            'security-headers.csp.enabled' => $settings->csp_enabled,
            'security-headers.csp.report-only' => $settings->csp_report_only,
            'security-headers.csp.directives' => array_map(fn (?string $value): string => self::clean((string) $value), $settings->csp_directives),
            'security-headers.csp.report-uri' => blank($settings->csp_report_uri) ? null : self::clean($settings->csp_report_uri),
            'security-headers.hsts.enabled' => $settings->hsts_enabled,
            'security-headers.hsts.max-age' => $settings->hsts_max_age,
            'security-headers.hsts.include-subdomains' => $settings->hsts_include_subdomains,
            'security-headers.hsts.preload' => $settings->hsts_preload,
        ]);
    }

    /** Header values never carry line breaks (response splitting), even if one slipped past validation. */
    public static function clean(string $value): string
    {
        return trim(str_replace(["\r", "\n"], '', $value));
    }
}
