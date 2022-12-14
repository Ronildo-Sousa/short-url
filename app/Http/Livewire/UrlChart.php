<?php

namespace App\Http\Livewire;

use App\Charts\Sample;
use Livewire\Component;

class UrlChart extends Component
{
    protected $listeners = ['changeGraph' => '$refresh'];

    protected Sample $chart;
    private array $yearlyViews = [];

    public function mount()
    {
        $this->chart = new Sample;

        $this->chart->labels([
            __('Jan'),
            __('Fev'),
            __('Mar'),
            __('Abr'),
            __('Mai'),
            __('Jun'),
            __('Jul'),
            __('Ago'),
            __('Set'),
            __('Out'),
            __('Nov'),
            __('Dez'),
        ]);
        $this->chart->dataset("Yearly's views", 'line', $this->yearlyViews);
    }

    public function refreshData(array $views)
    {
        $this->yearlyViews = $views;
    }

    public function render()
    {
        return view('livewire.url-chart', [
            'chart' => $this->chart
        ]);
    }
}
