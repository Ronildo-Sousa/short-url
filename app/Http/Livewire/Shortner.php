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
        'url' => ['required', 'url', 'max:255'],
        'customCode' => ['alpha_dash', 'unique:urls,code', 'max:50'],
    ];

    public function create(): void
    {
        $this->shortUrl = "";

        $this->validate();

        $this->shortUrl = ShortUrl::run($this->url, $this->customCode);

        $this->qrCode = 'data:image/png;base64,' . base64_encode(
            QrCode::format('png')->size(300)->margin(3)->generate($this->shortUrl),
        );

        $this->url = "";
    }

    public function render(): View
    {
        return view('livewire.shortner');
    }
}
