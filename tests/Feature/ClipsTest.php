<?php

use App\Models\Clip;
use Illuminate\Support\Facades\Cache;
use Livewire\Volt\Volt;

it('renders successfully', function () {
    Volt::test('clips')
        ->assertStatus(200);
});

it('shows clips', function () {
    Clip::factory()
        ->create(['content' => 'foo']);

    Volt::test('clips')
        ->assertSee('foo');
});

it('takes limit from the cache', function () {
    Clip::factory()
        ->count(20)
        ->create();

    Cache::set('limit', 10);

    Volt::test('clips')
        ->assertViewHas('clips', function ($clips) {
            $this->assertEquals(count($clips), 10);

            return true;
        });
});
