<?php

namespace App\Http\Livewire;

use App\Models\Url;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;

class UrlItem extends Component
{
    public Url $url;

    public function getLatestView()
    {
        $latestUrl = $this->url->lastView();
        if ($latestUrl) {
            return $latestUrl->created_at->format('d/m/Y H:m');
        }
        return null;
    }

    public function formatedURL(string $url)
    {
        if (Str::length($url) > 28) {
            return Str::substrReplace($url, '...', 28);
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
