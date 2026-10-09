---
name: filament-security-headers-development
description: Work with the Filament Security Headers plugin — the settings page that edits laravel-security-headers' CSP, response headers and HSTS at runtime.
---

# Filament Security Headers Development

- **Package**: `jeffersongoncalves/filament-security-headers` (branch `1.x`, Filament 3.x)
- **Namespace**: `JeffersonGoncalves\Filament\SecurityHeaders`
- **Depends on**: `jeffersongoncalves/laravel-security-headers:^2.0`, `spatie/laravel-settings`

## Setup

```bash
php artisan vendor:publish --tag=filament-security-headers-settings-migrations
php artisan migrate
```

## Troubleshooting

- **Edits not applied**: the route must use the `SecurityHeaders` middleware; the settings are applied when the app boots.
- **Blocked assets after a CSP change**: turn on report-only, or use "Reset to config".
- **Settings errors**: the `security_headers` group is missing — publish and run the migrations.
