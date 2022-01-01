<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Runes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="min-w-full p-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="inline-flex w-full space-x-4">
                    @foreach ($runes_groups as $style=>$runes)
                        <a href="#{{$style}}" class="font-bold underline uppercase hover:no-underline hover:opacity-50">
                            <img class="w-8" src="{{ $runes[0]->style_icon }}">
                        </a>
                    @endforeach
                </div>
                @foreach($runes_groups as $style=>$runes)
                    <h2 class="inline-flex items-center mt-12 mb-2 ml-2 text-xl font-bold underline uppercase" id="{{$style}}">
                        <img class="w-8" src="{{ $runes[0]->style_icon }}">
                        <span class="ml-2">{{$style}}</span>
                    </h2>
                    <div class="grid grid-cols-3 gap-2 px-4 md:grid-cols-5 lg:grid-cols-6">
                        @foreach($runes as $rune)
                            <div class="flex flex-col items-center justify-start col-span-1 py-2 m-2 space-y-2 text-center border rounded-lg shadow bg-orange-50">
                                <p class="px-2 text-sm font-bold">
                                    {{ $rune->name }}
                                </p>
                                <div class="relative w-16">
                                    <x-tooltip>
                                        <x-slot name="trigger">
                                            <img src="{{ $rune->icon }}" class="w-24">
                                        </x-slot>
                                        <div class="space-y-2">
                                            <p>{{ $rune->short_desc }}</p>
                                            <hr>
                                            <p>{!! $rune->long_desc !!}</p>
                                        </div>
                                    </x-tooltip>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
