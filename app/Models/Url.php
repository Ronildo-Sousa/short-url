<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Url extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'target_url',
        'user_id'
    ];

    public function lastView()
    {
        return $this->views->last();
    }

    public function todayViews()
    {
        return View::query()
            ->where('url_id', $this->id)
            ->whereDay('created_at', now()->day)
            ->count();
    }

    public function monthViews(int $month, int $year = null)
    {
        return View::query()
            ->where('url_id', $this->id)
            ->whereMonth('created_at', $month)
            ->when($year, fn ($query, $year) => $query->whereYear('created_at', $year))
            ->count();
    }

    public function weekViews()
    {
        return $this->views->where('created_at', '>=', now()->subWeek())->count();
    }

    public function totalViews()
    {
        return $this->views->count();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function views(): HasMany
    {
        return $this->hasMany(View::class);
    }
}
