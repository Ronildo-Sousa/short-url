<?php

use App\Models\Url;
use App\Models\User;

use function Pest\Laravel\actingAs;

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('has a list of user urls', function () {
    $urls = Url::factory(2)->for($this->user)->create();

    actingAs($this->user)
        ->get(route('dashboard'))
        ->assertOk()
        ->assertSee($urls->first()->code)
        ->assertSee($urls->last()->code);
});

it('user should see only their urls', function () {
    $urls = Url::factory(2)->for(User::factory())->create();

    actingAs($this->user)
        ->get(route('dashboard'))
        ->assertDontSee($urls->first()->code)
        ->assertDontSee($urls->last()->code)
        ->assertOk();
});
