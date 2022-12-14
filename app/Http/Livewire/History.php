<?php

namespace App\Http\Livewire;

use App\Charts\Sample;
use App\Models\Url;
use Livewire\Component;

class History extends Component
{
    public Url $url;
    public $yearlyViews = [];
    public int $selectedYear;
    public array $urlYears = [];

    public function mount()
    {
        $this->selectedYear = now()->year;
        $this->url = auth()->user()->urls->last();

        $this->getYearlyViews();

        $this->getUrlYears();
    }

    public function getUrlYears()
    {
        $this->url->views
            ->countBy(function ($item) {
                return $item->created_at->format('Y');
            })
            ->each(function ($item, $key) {
                $this->urlYears[] = $key;
            });
    }

    public function getYearlyViews()
    {
        $this->yearlyViews = [];

        for ($i = 1; $i < 13; $i++) {
            $this->yearlyViews[] = $this->url->monthViews($i, $this->selectedYear);
        }
        $this->emit('changeGraph', $this->yearlyViews);
    }

    public function render()
    {
        return view('livewire.history');
    }
}

// $this->chart->labels([
//     __('Jan'),
//     __('Fev'),
//     __('Mar'),
//     __('Abr'),
//     __('Mai'),
//     __('Jun'),
//     __('Jul'),
//     __('Ago'),
//     __('Set'),
//     __('Out'),
//     __('Nov'),
//     __('Dez'),
// ]);
// $this->chart->dataset("Yearly's views", 'line', $this->yearlyViews);

// {!! $chart->container() !!}
// {!! $chart->script() !!}