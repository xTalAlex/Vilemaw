<x-app-layout>
    <x-slot name="header">
        <div class="inline-flex">
            <img src="{{ $champion->thumb_image }}" class="w-16">
            <div class="ml-2">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ $champion->name }}
                </h2>
                <h3 class="text-gray-700">{{ $champion->title }}</h3>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="min-w-full overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-2">
                    {{ $champion->lore }}
                </div>
                
                @if($champion->skins()->count())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($champion->skins as $skin)
                    <div class="relative col-span-1"
                        x-data="{ visible:false }"
                        x-on:mouseenter="visible=true"
                        x-on:mouseleave="visible=false"
                    >
                        <a class="group" href="{{ $skin->splash_image }}">
                            <h4 class="capitalize z-10 absolute px-2 py-0.5 rounded bg-opacity-80 font-bold text-white bg-gray-800 bottom-1 left-1"
                                x-cloak
                                x-show="visible"
                            >
                                <span class="inline-flex items-center">
                                    {{ $skin->name }}
                                    @if($skin->chromas)
                                    <img class="w-4 ml-1" src="https://upload.wikimedia.org/wikipedia/commons/c/c5/Colorwheel.svg">
                                    @endif
                                </span>
                            </h4>
                            <img class="group-hover:opacity-80" src="{{ $skin->splash_image }}"> 
                        </a>
                    </div>
                    @endforeach
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
