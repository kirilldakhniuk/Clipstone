<?php

use App\Models\Clip;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Native\Laravel\Facades\Clipboard;

Schedule::command('read:from-clipboard')->everySecond();
