<?php

use Filament\Facades\Filament;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use JeffersonGoncalves\Filament\SecurityHeaders\Pages\ManageSecurityHeaders;
use JeffersonGoncalves\Filament\SecurityHeaders\SecurityHeadersPlugin;
use JeffersonGoncalves\Filament\SecurityHeaders\Settings\SecurityHeadersSettings;
use JeffersonGoncalves\SecurityHeaders\Middleware\SecurityHeaders;
use Livewire\Livewire;

beforeEach(function () {
    Filament::setCurrentPanel(Filament::getPanel('test'));
    $this->actingAs((new User)->forceFill(['id' => 1, 'name' => 'Admin', 'email' => 'admin@example.com']));
    Route::middleware(SecurityHeaders::class)->get('/probe', fn () => 'ok');
});

it('registers the settings page on the panel', function () {
    expect(Filament::getPanel('test')->getPages())->toContain(ManageSecurityHeaders::class)
        ->and(SecurityHeadersPlugin::make()->getId())->toBe('filament-security-headers');
});

it('uses translated labels and the group given to the plugin', function () {
    expect(ManageSecurityHeaders::getNavigationLabel())->toBe('Security headers')
        ->and(ManageSecurityHeaders::getNavigationGroup())->toBe('Settings');

    Filament::getPanel('test')->getPlugin('filament-security-headers')->navigationGroup(fn (): string => 'System');
    expect(ManageSecurityHeaders::getNavigationGroup())->toBe('System');

    app()->setLocale('pt_BR');
    expect((new ManageSecurityHeaders)->getTitle())->toBe('Headers de segurança');
});

it('opens with the config values while nothing is saved', function () {
    Livewire::test(ManageSecurityHeaders::class)
        ->assertFormSet([
            'csp_enabled' => true,
            'csp_report_only' => false,
            'hsts_max_age' => 31536000,
            'headers' => array_map(fn ($value) => (string) $value, config('security-headers.headers')),
        ]);
});

it('saves headers that the middleware then sends', function () {
    Livewire::test(ManageSecurityHeaders::class)
        ->fillForm([
            'csp_report_only' => true,
            'csp_directives' => ['default-src' => "'self'", 'script-src' => "'self' https://cdn.example.com"],
            'headers' => ['X-Frame-Options' => 'DENY', 'X-Content-Type-Options' => 'nosniff', 'Referrer-Policy' => ''],
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect(app(SecurityHeadersSettings::class)->refresh()->customized)->toBeTrue();

    $this->get('/probe')
        ->assertHeader('Content-Security-Policy-Report-Only', "default-src 'self'; script-src 'self' https://cdn.example.com")
        ->assertHeaderMissing('Content-Security-Policy')
        ->assertHeader('X-Frame-Options', 'DENY')
        ->assertHeaderMissing('Referrer-Policy');
});

it('rejects line breaks and invalid names', function () {
    Livewire::test(ManageSecurityHeaders::class)
        ->fillForm([
            'headers' => ['X-Test' => "a\r\nSet-Cookie: stolen=1"],
            'csp_directives' => ['Not A Directive' => "'self'"],
        ])
        ->call('save')
        ->assertHasFormErrors(['headers', 'csp_directives']);

    expect(app(SecurityHeadersSettings::class)->refresh()->customized)->toBeFalse();
});

it('goes back to the config', function () {
    Livewire::test(ManageSecurityHeaders::class)
        ->fillForm(['headers' => ['X-Frame-Options' => 'DENY']])
        ->call('save')
        ->callAction('reset');

    expect(app(SecurityHeadersSettings::class)->refresh()->customized)->toBeFalse();

    $this->get('/probe')
        ->assertHeader('X-Frame-Options', config('security-headers.headers.X-Frame-Options'))
        ->assertHeader('Content-Security-Policy');
});
