<?php

namespace App\Console\Commands;

use App\Models\Clip;
use Illuminate\Console\Command;
use Native\Laravel\Facades\Clipboard;

class ReadFromClipboard extends Command
{
    protected $signature = 'read:from-clipboard';

    protected $description = 'Command description';

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

        if (Clipboard::image() !== null) {
            Clip::query()->firstOrCreate(
                [
                    'content' => Clipboard::image(),
                ],
                [
                    'content' => Clipboard::image(),
                    'type' => 'image',
                ]
            );
        }
    }
}
