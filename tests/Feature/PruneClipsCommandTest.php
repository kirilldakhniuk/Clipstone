<?php

use App\Console\Commands\PruneClips;
use App\Models\Clip;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

it('removes clips based on setting', function () {
    Cache::set('keep', 10);

    Clip::factory()
        ->count(2)
        ->sequence(
            ['created_at' => Carbon::parse('10 days ago')],
            ['created_at' => Carbon::parse('20 days ago')],
        )
        ->create();

    $this->assertDatabaseCount('clips', 2);

    Artisan::call(PruneClips::class);

    $this->assertDatabaseCount('clips', 1);
});
