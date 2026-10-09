<?php

namespace JeffersonGoncalves\Filament\SecurityHeaders;

use Illuminate\Support\Facades\Config;
use JeffersonGoncalves\Filament\SecurityHeaders\Settings\SecurityHeadersSettings;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SecurityHeadersServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-security-headers')
            ->hasTranslations();
    }

    public function packageRegistered(): void
    {
        Config::set('settings.settings', array_merge(
            Config::get('settings.settings', []),
            [SecurityHeadersSettings::class]
        ));
    }

    public function packageBooted(): void
    {
        $migrations = __DIR__.'/../database/settings';

        Config::set('settings.migrations_paths', array_merge([$migrations], Config::get('settings.migrations_paths', [])));

        $this->publishes([$migrations => database_path('settings')], 'filament-security-headers-settings-migrations');

        // Saved headers replace config/security-headers.php from here on (no-op until something is saved).
        $this->app->booted(fn () => SecurityHeadersOverrides::apply());
    }
}
