<?php

namespace App\Actions\Url;

use App\Models\Url;
use Illuminate\Support\Str;

class ShortUrl
{
    public static function run(string $url): string
    {
        $code = Url::query()
            ->create([
                'user_id' => auth()->user()->id ?? null,
                'code' => self::handleCode(),
                'target_url' => $url,
            ])->code;

        return config('app.url') . $code;
    }

    private static function handleCode(string $code = null): string
    {
        if (empty($code)) {
            $code = Str::random(5);
        }
        $exists = Url::query()->where('code', $code)->first();

        if ($exists) {
            return self::handleCode(Str::random(5));
        }

        return $code;
    }
}
