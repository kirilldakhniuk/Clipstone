<?php

namespace App\Console\Commands;

use App\Models\Clip;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class PruneClips extends Command
{
    protected $signature = 'app:prune-clips';

    protected $description = 'Command description';

    public function handle()
    {
        Clip::query()
            ->whereDate('created_at', '>=', Carbon::parse(Cache::get('limit', 10).' days ago'))
            ->delete();
    }
}
