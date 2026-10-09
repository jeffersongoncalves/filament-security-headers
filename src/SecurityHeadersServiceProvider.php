<?php

namespace JeffersonGoncalves\Filament\SecurityHeaders;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SecurityHeadersServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-security-headers')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigrations();
    }
}
