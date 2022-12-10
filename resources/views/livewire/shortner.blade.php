<div>
   {{ $shortUrl }}
   @error('customCode')
      {{ $message }}
   @enderror
   @error('url')
      {{ $message }}
   @enderror
</div>
