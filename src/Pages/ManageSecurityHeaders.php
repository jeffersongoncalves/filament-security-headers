<?php

namespace JeffersonGoncalves\Filament\SecurityHeaders\Pages;

use Closure;
use Filament\Actions\Action;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use JeffersonGoncalves\Filament\SecurityHeaders\SecurityHeadersOverrides;
use JeffersonGoncalves\Filament\SecurityHeaders\SecurityHeadersPlugin;
use JeffersonGoncalves\Filament\SecurityHeaders\Settings\SecurityHeadersSettings;

class ManageSecurityHeaders extends SettingsPage
{
    protected static string $settings = SecurityHeadersSettings::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-shield-check';

    public static function getNavigationLabel(): string
    {
        return __('filament-security-headers::security-headers.navigation_label');
    }

    public static function getNavigationGroup(): string|\UnitEnum|null
    {
        return SecurityHeadersPlugin::current()?->getNavigationGroup() ?? __('filament-security-headers::security-headers.navigation_group');
    }

    public function getTitle(): string
    {
        return __('filament-security-headers::security-headers.title');
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->schema([
                Section::make(__('filament-security-headers::security-headers.sections.csp.heading'))
                    ->description(__('filament-security-headers::security-headers.sections.csp.description'))
                    ->schema([
                        Toggle::make('csp_enabled')
                            ->label(__('filament-security-headers::security-headers.fields.csp_enabled.label')),
                        Toggle::make('csp_report_only')
                            ->label(__('filament-security-headers::security-headers.fields.csp_report_only.label'))
                            ->helperText(__('filament-security-headers::security-headers.fields.csp_report_only.helper')),
                        KeyValue::make('csp_directives')
                            ->label(__('filament-security-headers::security-headers.fields.csp_directives.label'))
                            ->keyLabel(__('filament-security-headers::security-headers.fields.csp_directives.key'))
                            ->valueLabel(__('filament-security-headers::security-headers.fields.csp_directives.value'))
                            ->helperText(__('filament-security-headers::security-headers.fields.csp_directives.helper'))
                            ->reorderable()
                            ->rules([fn (): Closure => self::mapRule('/^[a-z][a-z0-9-]*$/', 'directive')]),
                        TextInput::make('csp_report_uri')
                            ->label(__('filament-security-headers::security-headers.fields.csp_report_uri.label'))
                            ->helperText(__('filament-security-headers::security-headers.fields.csp_report_uri.helper'))
                            ->maxLength(2048)
                            ->nullable(),
                    ]),
                Section::make(__('filament-security-headers::security-headers.sections.headers.heading'))
                    ->description(__('filament-security-headers::security-headers.sections.headers.description'))
                    ->schema([
                        KeyValue::make('headers')
                            ->label(__('filament-security-headers::security-headers.fields.headers.label'))
                            ->keyLabel(__('filament-security-headers::security-headers.fields.headers.key'))
                            ->valueLabel(__('filament-security-headers::security-headers.fields.headers.value'))
                            ->rules([fn (): Closure => self::mapRule('/^[A-Za-z0-9-]+$/', 'header')]),
                    ]),
                Section::make(__('filament-security-headers::security-headers.sections.hsts.heading'))
                    ->description(__('filament-security-headers::security-headers.sections.hsts.description'))
                    ->schema([
                        Toggle::make('hsts_enabled')
                            ->label(__('filament-security-headers::security-headers.fields.hsts_enabled.label')),
                        TextInput::make('hsts_max_age')
                            ->label(__('filament-security-headers::security-headers.fields.hsts_max_age.label'))
                            ->numeric()
                            ->integer()
                            ->minValue(0)
                            ->required(),
                        Toggle::make('hsts_include_subdomains')
                            ->label(__('filament-security-headers::security-headers.fields.hsts_include_subdomains.label')),
                        Toggle::make('hsts_preload')
                            ->label(__('filament-security-headers::security-headers.fields.hsts_preload.label'))
                            ->helperText(__('filament-security-headers::security-headers.fields.hsts_preload.helper')),
                    ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('reset')
                ->label(__('filament-security-headers::security-headers.actions.reset.label'))
                ->icon('heroicon-o-arrow-uturn-left')
                ->color('gray')
                ->requiresConfirmation()
                ->modalHeading(__('filament-security-headers::security-headers.actions.reset.heading'))
                ->modalDescription(__('filament-security-headers::security-headers.actions.reset.description'))
                ->visible(fn (): bool => app(SecurityHeadersSettings::class)->customized)
                ->action(function (): void {
                    $settings = app(SecurityHeadersSettings::class);
                    $settings->customized = false;
                    $settings->save();

                    SecurityHeadersOverrides::apply();
                    $this->fillForm();

                    Notification::make()->success()->title(__('filament-security-headers::security-headers.actions.reset.done'))->send();
                }),
        ];
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        return ($data['customized'] ?? false) ? $data : SecurityHeadersOverrides::defaults();
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['customized'] = true;
        $data['csp_report_uri'] = blank($data['csp_report_uri'] ?? null) ? null : SecurityHeadersOverrides::clean((string) $data['csp_report_uri']);

        return $data;
    }

    protected function afterSave(): void
    {
        SecurityHeadersOverrides::apply();
    }

    /** Key/value validation: names must match $pattern and no key or value may carry a line break. */
    private static function mapRule(string $pattern, string $kind): Closure
    {
        return function (string $attribute, mixed $value, Closure $fail) use ($pattern, $kind): void {
            foreach ((array) $value as $name => $content) {
                // Filament 4+ keeps the KeyValue state as rows (uuid => [key, value]) until it is dehydrated.
                if (is_array($content)) {
                    [$name, $content] = [$content['key'] ?? '', $content['value'] ?? ''];
                }

                if (preg_match($pattern, (string) $name) !== 1) {
                    $fail(__('filament-security-headers::security-headers.validation.'.$kind, ['name' => (string) $name]));
                }

                if (preg_match('/[\r\n]/', (string) $name.(string) $content) === 1) {
                    $fail(__('filament-security-headers::security-headers.validation.line_breaks'));
                }
            }
        };
    }
}
