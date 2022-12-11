<?php

use App\Models\Url;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;

beforeEach(function () {
    $this->url = Url::factory()->create();
});

it('should be able to access a short url', function () {
    get(route('accessUrl', ['code' => $this->url->code]))
        ->assertRedirect($this->url->target_url);
});

it('should not be able to access a invalid url', function () {
    get(route('accessUrl', ['code' => 'invalid-code']))
        ->assertNotFound();
});

it('should increments the number of view when access the url', function () {
    get(route('accessUrl', ['code' => $this->url->code]));

    assertDatabaseHas('views', [
        'url_id' => $this->url->id,
        'created_at' => now()
    ]);
});
