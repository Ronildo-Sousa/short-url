<?php

namespace App\Http\Livewire;

use App\Models\Url;
use Illuminate\Support\Collection;
use Livewire\Component;

class Dashboard extends Component
{
    protected $listeners = [
        'deleted-url' => '$refresh',
        'refresh-page' => '$refresh',
    ];

    public ?Collection $urls = null;

    public function mount()
    {
        $this->urls = Url::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
