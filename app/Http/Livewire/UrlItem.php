<?php

namespace App\Http\Livewire;

use App\Models\Url;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UrlItem extends Component
{
    public Url $url;
    public ?string $shortUrl = "";
    public ?string $qrCode = "";

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
        $this->shortUrl = config('app.url') . '/' . $this->url->code;

        if (session()->has('newView')) {
            $this->test = "new-view";
        }

        $this->qrCode = 'data:image/png;base64,' . base64_encode(
            QrCode::format('png')->size(300)->margin(3)->generate($this->shortUrl),
        );
    }

    public function render()
    {
        return view('livewire.url-item');
    }
}
