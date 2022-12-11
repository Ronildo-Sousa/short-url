@props(['urls'])

<div class="flex justify-between w-4/5 mb-2 font-semibold">
    <p>{{ __('Short URL') }}</p>
    <p class="ml-5">{{ __('Full URL') }}</p>
    <p class="ml-5">{{ __('Views') }}</p>
</div>

@foreach ($urls as $url)
    <livewire:url-item :key="time() . $url->id" :url="$url" />
@endforeach
