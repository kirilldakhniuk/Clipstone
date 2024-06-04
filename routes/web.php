<?php

use Livewire\Volt\Volt;

Volt::route('/', 'clips.index')->name('clips.index');
Volt::route('/settings', 'settings')->name('settings');
