<section>
    <div>
        <input wire:model='url' type="url" placeholder="your url">
        @error('url')
            <small class="text-red-500">
                {{ $message }}
            </small>
        @enderror
    </div>
    @error('customCode')
        {{ $message }}
    @enderror
    <button wire:click='create' class="p-3 bg-blue-400">short</button>
</section>
