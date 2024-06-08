<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades;

new class extends Component {
    public int $limit = 10;
    public int $keep = 10;

    public function mount(): void
    {
        if (Cache::has('limit')) {
            $this->limit = Cache::get('limit');
        }

        if (Cache::has('keep')) {
            $this->keep = Cache::get('keep');
        }
    }

    public function updating($property, $value): void
    {
        Cache::forever($property, $value);
    }
}; ?>

<div>
    <x-header>
        <x-slot:actions class="order-first">
            <x-button label="Back" icon="o-arrow-left" link="{{ route('clips') }}" />
        </x-slot:actions>
    </x-header>

    <x-card title="Show" class="mb-6">
        <x-radio
            :options="config('menubar.limit')"
            option-label="label"
            option-value="value"
            wire:model.live="limit"
        />
    </x-card>

    <x-card title="Keep history for">
        <x-radio
            :options="config('menubar.keep')"
            option-label="label"
            option-value="value"
            wire:model.live="keep"
        />
    </x-card>
</div>
