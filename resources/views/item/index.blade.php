<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="min-w-full p-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="w-full space-x-1">
                    @foreach ($items_groups as $group=>$items)
                        <a href="#{{$group}}" class="font-bold underline uppercase hover:no-underline hover:opacity-50">{{$group}}</a>
                    @endforeach
                </div>
                @foreach($items_groups as $depth=>$items)
                    <h2 class="mt-12 mb-2 ml-2 text-xl font-bold underline uppercase" id="{{$depth}}">{{$depth}}</h2>
                    <div class="grid grid-cols-3 gap-2 px-4 md:grid-cols-5 lg:grid-cols-6">
                        @foreach($items as $item)
                            <div class="flex flex-col items-center justify-start col-span-1 py-2 m-2 space-y-2 text-center border rounded-lg shadow bg-orange-50">
                                <p class="px-2 text-sm font-bold">
                                    {{ $item->name }}
                                </p>
                                <div class="relative w-16">
                                    <x-tooltip>
                                        <x-slot name="trigger">
                                                <img src="{{ $item->image_path }}" class="w-full border @if(!$item->purchasable) grayscale @endif">
                                        </x-slot>
                                        <div class="space-y-2">
                                            <p>{{ $item->plaintext }}</p>
                                            <p>{!! $item->description !!}</p>
                                            <p>{{ $item->effect }}</p>
                                            <hr>
                                            <p>
                                                <span>Base {{ $item->gold_base }}g</span>/
                                                <span>Total {{ $item->gold_total }}g</span>/
                                                <span>Sell {{ $item->gold_sell }}g</span>
                                            </p>
                                        </div>
                                    </x-tooltip>

                                    @if($item->stacks && $item->stacks>1)
                                    <span class="absolute top-0 right-0 p-1 font-bold text-white">
                                        {{ $item->stacks }}
                                    </span>
                                    @endif

                                    @if($item->special_recipe)
                                    <div class="absolute border -bottom-1 -right-1">
                                        <x-tooltip>
                                            <x-slot name="trigger">
                                                <img class="w-6 h-6" src="{{ $item->specialRecipe->image_path }}">
                                            </x-slot>
                                            <div class="space-y-2">
                                                <p class="font-bold">{{ $item->specialRecipe->name }}</p>
                                                <p>{{ $item->specialRecipe->plaintext }}</p>
                                                <p>{!! $item->specialRecipe->description !!}</p>
                                            </div>
                                        </x-tooltip>
                                    </div>
                                    @endif

                                    @if($item->required_champion)
                                    <div class="absolute border -bottom-1 -left-1">
                                        <x-tooltip>
                                            <x-slot name="trigger">
                                                <img class="w-6 h-6" src="{{ $item->requiredChampion->thumb_image }}">
                                            </x-slot>
                                            <div class="space-y-2">
                                                <p class="font-bold">{{ $item->requiredChampion->name }}</p>
                                            </div>
                                        </x-tooltip>
                                    </div>
                                    @endif
                                    
                                </div>

                                <p class="text-xs">
                                    {{ Str::of($item->colloq)->explode(';')->filter(fn ($name) => !empty(trim($name)) )->implode(', ') }}
                                </p>

                                @if($item->consumable)
                                <p class="p-1 text-xs font-bold uppercase">
                                    Consumable
                                </p>
                                @endif

                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
