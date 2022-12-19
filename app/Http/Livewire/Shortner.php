<?php

namespace App\Http\Livewire;

use App\Actions\Url\ShortUrl;
use Illuminate\View\View;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Shortner extends Component
{
    public string $url = "";
    public string $shortUrl = "";
    public ?string $customCode = "";
    public ?string $qrCode = "";

    protected $rules = [
        'url' => ['required', 'url'],
        'customCode' => ['alpha_dash', 'unique:urls,code'],
    ];

    public function create(): void
    {
        $this->shortUrl = "";

        $this->validate();

        $this->shortUrl = ShortUrl::run($this->url, $this->customCode);
        $this->url = "";
    }

    public function mount()
    {
        $this->qrCode = QrCode::generate("https://google.com.br");
    }

    public function render(): View
    {
        return view('livewire.shortner');
    }
}
