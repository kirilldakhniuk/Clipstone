<?php

use App\Models\Clip;
use Illuminate\Support\Collection;
use Livewire\Volt\Component;

new class extends Component {
    public string $search = '';

    public bool $drawer = false;

    public function copy(Clip $clip): void
    {
        Clipboard::text($clip->content);
    }

    public function delete(Clip $clip): void
    {
        $clip->delete();
    }

    public function headers(): array
    {
        return [
            ['key' => 'content', 'label' => 'Content'],
        ];
    }

    public function clips(): Collection
    {
        if ($this->search) {
            return Clip::search($this->search)
                ->take(cache('limit', 10))
                ->latest()
                ->get();
        }

        return Clip::query()
            ->limit(cache('limit', 10))
            ->latest()
            ->get();
    }

    public function with(): array
    {
        return [
            'clips' => $this->clips(),
            'headers' => $this->headers()
        ];
    }
}; ?>

<div>
    <x-header>
        <x-slot:middle class="!order-first">
            <x-input placeholder="Search..." wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>
        <x-slot:actions>
            <x-button icon="o-cog-6-tooth" link="{{ route('settings') }}" />
        </x-slot:actions>
    </x-header>

    <x-card>
        <div wire:poll.keep-alive.1s="clips">
            @foreach($clips as $clip)
                <x-list-item wire:key="{{ $clip->id }}" :item="$clip" no-hover>
                    <x-slot:value>
                        {{ $clip->content }}
                    </x-slot:value>
                    <x-slot:actions>
                        <x-button icon="o-clipboard" wire:click="copy({{ $clip->id }})" />
                        <x-button icon="o-trash" class="text-red-500" wire:click="delete({{ $clip->id }})" />
                    </x-slot:actions>
                </x-list-item>
            @endforeach
        </div>
    </x-card>
</div>
