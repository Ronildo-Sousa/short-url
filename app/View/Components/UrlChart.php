<?php

namespace App\View\Components;

use App\Charts\Sample;
use Illuminate\View\Component;

class UrlChart extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public Sample $chart,
        public array $monthViews = []
    ) {
        $this->chart->labels([
            __('Jan'),
            __('Fev'),
            __('Mar'),
            __('Abr'),
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
        $this->chart->dataset("Month's views", 'line', $this->monthViews);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.url-chart');
    }
}
