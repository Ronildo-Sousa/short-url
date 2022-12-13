<?php

namespace App\Http\Livewire;

use App\Charts\Sample;
use App\Models\Url;
use Livewire\Component;

class History extends Component
{
    public $monthViews = [];
    public Url $url;

    public function mount()
    {
        $this->url = auth()->user()->urls->first();

        for ($i = 1; $i < 13; $i++) {
            $this->monthViews[] = $this->url->monthViews($i);
        }
    }
    public function render()
    {
        return view('livewire.history');
    }
}
