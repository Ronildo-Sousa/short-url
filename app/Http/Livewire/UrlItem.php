<?php

namespace App\Http\Livewire;

use App\Models\Url;
use Livewire\Component;
use Illuminate\Support\Str;

class UrlItem extends Component
{
    public Url $url;

    public function getNumViews()
    {
        return $this->url->views->count();
    }

    public function formatedURL(string $url)
    {
        if (Str::length($url) > 25) {
            return Str::substrReplace($url, '...', 25);
        }
        return $url;
    }

    public function deleteURL()
    {
        $this->url->delete();
        $this->emit('deleted-url');
    }

    public function mount()
    {
        if (session()->has('newView')) {
            $this->test = "new-view";
        }
    }

    public function render()
    {
        return view('livewire.url-item');
    }
}
