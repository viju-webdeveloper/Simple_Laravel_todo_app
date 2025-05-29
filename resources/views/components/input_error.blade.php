@props(['name'])
<div class="block item-center">
    @error($name)
    <p class="text-red-500">
        {{$message}}
    </p>
    @enderror
</div>