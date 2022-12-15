<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Yearly views') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <div class="rounded" style="height: 22rem; width: 80%; background: rgb(82, 97, 122); margin-top: 5rem" >
            <livewire:livewire-column-chart :column-chart-model="$columnChartModel" />
        </div>
    </div>
</div>
