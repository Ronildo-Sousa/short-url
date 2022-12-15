<?php

namespace App\Http\Livewire;

use App\Models\Url;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;
use Termwind\Components\Ul;

class History extends Component
{
    public Url $url;
    public $yearlyViews = [];

    private ColumnChartModel $columnChartModel;

    public function mount()
    {
        $isOwner = auth()->user()->urls->contains(function ($value) {
            return $value->user_id === $this->url->user_id;
        });
        if (!$isOwner) {
            abort(Response::HTTP_NOT_FOUND);
        }
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
            ->withoutLegend()
            ->setTitle(__("Yearly views"));

        $mouths = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];

        for ($i = 0; $i < 12; $i++) {
            $this->columnChartModel
                ->addColumn($mouths[$i], $this->yearlyViews[$i], "#fc7703");
        }
    }

    public function render()
    {
        return view('livewire.history', [
            'columnChartModel' => $this->columnChartModel
        ]);
    }
}
