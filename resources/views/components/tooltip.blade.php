<div class="relative"
    x-data="{ tooltip: false }"
>

    <div class="cursor-pointer"
        x-on:mouseover="tooltip = true" 
        x-on:mouseleave="tooltip = false"
    >
        {{ $trigger }}
    </div>

    <div class="absolute z-10 w-48 p-2 text-xs text-left text-white bg-black rounded-lg shadow-lg bg-opacity-90" 
        x-show="tooltip"
        x-cloak
    >
        {{ $slot }}
    </div>
</div>