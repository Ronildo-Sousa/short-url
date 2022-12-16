<?php

use App\Jobs\CleanUrls;
use App\Models\Url;
use App\Models\User;

use function Pest\Laravel\assertDatabaseCount;

it('should delete by default urls that dont have user olders than 7 days', function () {
    Url::factory()->create(['user_id' => User::factory(), 'created_at' => now()->subDays(7)]);
    Url::factory(3)->create(["created_at" => now()->subDays(7)]);

    assertDatabaseCount('urls', 4);
    CleanUrls::dispatchSync();
    assertDatabaseCount('urls', 1);
});

it('should delete urls that dont have user olders than received days', function () {
    Url::factory()->create(['created_at' => now()->subDays(5)]);
    Url::factory(3)->create(["created_at" => now()->subDays(7)]);

    assertDatabaseCount('urls', 4);
    CleanUrls::dispatchSync(days: 5);
    assertDatabaseCount('urls', 0);
});

it('should delete urls that have user only when pass the withUsers param', function () {
    Url::factory()->create(['user_id' => User::factory(), 'created_at' => now()->subDays(7)]);
    Url::factory(3)->create(["created_at" => now()->subDays(7)]);

    assertDatabaseCount('urls', 4);
    CleanUrls::dispatchSync(withUsers: true);
    assertDatabaseCount('urls', 0);
});
