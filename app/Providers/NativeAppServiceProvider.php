<?php

namespace App\Providers;

use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Facades\Window;
use Native\Laravel\Contracts\ProvidesPhpIni;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    public function boot(): void
    {
        MenuBar::create()
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
