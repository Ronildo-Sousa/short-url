<?php

namespace App\Http\Livewire;

use App\Models\Url;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Livewire\Component;

class History extends Component
{
    public Url $url;
    public $yearlyViews = [];

    private ColumnChartModel $columnChartModel;

    public function mount()
    {
        $this->getYearlyViews();

        $this->configChart();
    }

    public function getYearlyViews()
    {
        $this->yearlyViews = [];

        for ($i = 1; $i < 13; $i++) {
            $this->yearlyViews[] = $this->url->monthViews($i);
        }
    }

    public function configChart()
    {
        $this->columnChartModel = (new ColumnChartModel())
            ->setTitle(__("Yearly views"));

        $mouths = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];

        for ($i = 0; $i < 12; $i++) {
            $this->columnChartModel
                ->addColumn($mouths[$i], $this->yearlyViews[$i], "#db771f");
            // ->addColumn($mouths[$i], $this->yearlyViews[$i], sprintf('#%06X', mt_rand(0, 0xFFFFFF)));
        }
    }

    public function render()
    {
        return view('livewire.history', [
            'columnChartModel' => $this->columnChartModel
        ]);
    }
}
