<?php

namespace App\Http\Livewire;

use App\Models\Url;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    protected $listeners = [
        'deleted-url' => '$refresh',
        'refresh-page' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.dashboard', [
            'urls' => Url::query()
                ->where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'DESC')
                ->paginate(2)
        ]);
    }
}
