<div>
    <div>
        <select wire:model.defer='selectedYear'>
            @foreach ($urlYears as $year)
                <option value="{{$year}}">{{$year}}</option>
            @endforeach
        </select>
        <button wire:click="getYearlyViews()">Search</button>
       <p> {{ print_r($yearlyViews) }} </p>
    </div>

    <livewire:url-chart />
</div>
