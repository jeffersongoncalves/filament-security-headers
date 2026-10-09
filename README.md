<div class="filament-hidden">

![Filament Security Headers](https://raw.githubusercontent.com/jeffersongoncalves/filament-security-headers/2.x/art/jeffersongoncalves-filament-security-headers.png)

</div>

# Filament Security Headers

[![Buy Me A Coffee](https://img.shields.io/badge/Buy%20Me%20A%20Coffee-support-FFDD00?style=flat-square&logo=buy-me-a-coffee&logoColor=black)](https://buymeacoffee.com/jeffersongoncalves)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-security-headers.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-security-headers)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-security-headers/fix-php-code-style-issues.yml?branch=2.x&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-security-headers/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3A2.x)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-security-headers.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-security-headers)
[![License](https://img.shields.io/packagist/l/jeffersongoncalves/filament-security-headers.svg?style=flat-square)](LICENSE.md)

A Filament settings page for [jeffersongoncalves/laravel-security-headers](https://github.com/jeffersongoncalves/laravel-security-headers): edit the Content Security Policy, the response headers and HSTS from the panel instead of a config change and a deploy.

- **CSP directives** as key/value pairs, the `{nonce}` placeholder included, plus the report URI
- **Report-only mode** to try a new policy (`Content-Security-Policy-Report-Only`) before enforcing it
- **Response headers** (`X-Frame-Options`, `Referrer-Policy`, `Permissions-Policy`...): edit, add, or leave a value empty to drop one
- **HSTS**: on/off, max-age, subdomains, preload
- **Reset to config** at any time

Until the page is saved, nothing changes: the middleware keeps using `config/security-headers.php`, and the page opens with those values. Header and directive names are validated and line breaks are rejected (no response splitting).

## Compatibility

| Branch | Filament | Package version |
|--------|----------|-----------------|
| 1.x | 3.x | `^1.0` |
| 2.x | 4.x | `^2.0` |
| 3.x | 5.x | `^3.0` |

## Installation

```bash
composer require jeffersongoncalves/filament-security-headers:"^2.0"
php artisan vendor:publish --tag=filament-security-headers-settings-migrations
php artisan migrate
```

Set up [laravel-security-headers](https://github.com/jeffersongoncalves/laravel-security-headers#usage) first (the `SecurityHeaders` middleware on your routes).

## Usage

```php
use JeffersonGoncalves\Filament\SecurityHeaders\SecurityHeadersPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            SecurityHeadersPlugin::make()
                // optional: one of your panel's own groups (string or closure)
                ->navigationGroup(fn (): string => __('admin.navigation.settings')),
        ]);
}
```

The saved values are read once per request (one settings query; enable the [spatie/laravel-settings cache](https://github.com/spatie/laravel-settings#caching-settings) to skip it). The header is built on every request — including pages served by a full-page cache such as [laravel-page-cache](https://github.com/jeffersongoncalves/laravel-page-cache) — so a saved change applies right away; flushing the page cache does not change it.

### Tightening the policy safely

1. Turn on **report-only**, change the directive (e.g. swap `'unsafe-inline'` for `'nonce-{nonce}'` in `script-src`) and save.
2. Browse the site and watch the browser console: report-only logs every violation without blocking anything.
3. Fix what violates (inline scripts without the nonce, Alpine expressions that need `'unsafe-eval'` — see [Nonces](https://github.com/jeffersongoncalves/laravel-security-headers#nonces-for-inline-scripts) and [Alpine.js / Livewire without 'unsafe-eval'](https://github.com/jeffersongoncalves/laravel-security-headers#alpinejs--livewire-without-unsafe-eval)), then turn report-only off.

If something breaks after enforcing, put the old value back (or **Reset to config**) — no deploy needed. Proxies may also add scripts of their own (e.g. Cloudflare's Google tag gateway injects inline GTM without the nonce); check the page as a real browser receives it.

## Requirements

- PHP 8.2 or higher
- Filament 4.x
- [jeffersongoncalves/laravel-security-headers](https://github.com/jeffersongoncalves/laravel-security-headers) 2.x

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jefferson Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
