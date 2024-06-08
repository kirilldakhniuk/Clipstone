<?php

namespace App\Providers;

use Native\Laravel\Contracts\ProvidesPhpIni;
use Native\Laravel\Facades\MenuBar;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    public function boot(): void
    {
        MenuBar::create()
            ->icon(storage_path('app/clipboard.png'))
            ->width(600)
            ->height(600)
            ->alwaysOnTop();
    }

    public function phpIni(): array
    {
        return [
        ];
    }
}
