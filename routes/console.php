<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('read:from-clipboard')->everySecond();
Schedule::command('app:prune-clips')->daily();
