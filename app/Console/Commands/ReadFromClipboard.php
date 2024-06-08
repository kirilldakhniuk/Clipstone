<?php

namespace App\Console\Commands;

use App\Models\Clip;
use Illuminate\Console\Command;
use Native\Laravel\Facades\Clipboard;

class ReadFromClipboard extends Command
{
    protected $signature = 'read:from-clipboard';

    protected $description = 'Temporary workaround';

    public function handle(): void
    {
        if (Clipboard::text() !== null) {
            Clip::query()->firstOrCreate(
                [
                    'content' => Clipboard::text(),
                ],
                [
                    'content' => Clipboard::text(),
                    'type' => 'text',
                ]
            );
        }
    }
}
