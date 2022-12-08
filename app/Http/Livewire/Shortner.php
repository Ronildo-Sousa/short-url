<?php

namespace App\Http\Livewire;

use App\Actions\Url\ShortUrl;
use Illuminate\View\View;
use Livewire\Component;

class Shortner extends Component
{
    public string $url = "";
    public string $shortUrl = "";
    public ?string $customCode = null;

    public function create(): void
    {
        $this->shortUrl = ShortUrl::run($this->url, $this->customCode);
    }

    public function render(): View
    {
        return view('livewire.shortner');
    }
}
