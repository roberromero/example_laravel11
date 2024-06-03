@props(['name'])

@error($name)
    <span class="text-red-500 text-xs italic">{{$message}}</span>
@enderror
