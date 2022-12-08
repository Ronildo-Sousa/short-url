<?php

use App\Http\Livewire\Shortner;
use App\Models\Url;
use App\Models\User;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Livewire\livewire;


it('should be able to create a short url', function () {
    livewire(Shortner::class)
        ->set('url', "https://laravel.com/docs/9.x/validation#main-content")
        ->call('create')
        ->assertHasNoErrors()
        ->assertSee(Url::first()->code);

    assertDatabaseCount('urls', 1);
});

it('should be able to create a custom code for short url', function () {
    livewire(Shortner::class)
        ->set('url', "https://laravel.com/docs/9.x/validation#main-content")
        ->set('customCode', 'my-custom-code')
        ->call('create')
        ->assertHasNoErrors()
        ->assertSee('my-custom-code');

    assertDatabaseCount('urls', 1);
});
    
// it should not be able to use special chars in the code
// test code should be unique in database
// test url should be required
// test url should be a valid
