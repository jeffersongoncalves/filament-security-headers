## Filament Security Headers

Filament settings page for laravel-security-headers: CSP directives, response headers and HSTS edited from the panel, with a report-only mode.

@verbatim
<code-snippet name="Register in PanelProvider" lang="php">
use JeffersonGoncalves\Filament\SecurityHeaders\SecurityHeadersPlugin;

$panel->plugins([
    SecurityHeadersPlugin::make()->navigationGroup(fn (): string => __('admin.navigation.settings')),
]);
</code-snippet>
@endverbatim

### Architecture
- `Settings\SecurityHeadersSettings` (group `security_headers`, spatie/laravel-settings) stores the edits; `customized` stays false until the page is saved
- `SecurityHeadersOverrides::apply()` runs when the app boots and after each save/reset, writing the saved values over `config('security-headers.*')`, which the middleware reads
- Translations live under `filament-security-headers::security-headers.*`
