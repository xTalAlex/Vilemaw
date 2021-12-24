<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Champions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="min-w-full overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="w-full space-x-1">
                    @foreach (range('A', 'Z') as $char)
                        <a href="#{{$char}}" class="font-bold underline uppercase hover:no-underline hover:opacity-50">{{$char}}</a>
                    @endforeach
                </div>
                @foreach($champions_groups as $letter=>$champions)
                    <h2 class="mt-2 ml-2 text-xl font-bold underline uppercase" id="{{$letter}}">{{$letter}}</h2>
                    <div class="grid grid-cols-6 gap-1 px-1 md:grid-cols-8">
                        @foreach($champions as $champion)
                            <div class="flex flex-col items-center justify-start col-span-1 py-2 space-y-2 text-center border rounded-lg shadow cursor-pointer bg-zinc-400">
                                <p class="px-2 text-xs font-bold">{{ $champion->name }}</p>
                                <img src="{{ $champion->loading_image }}" class="w-16">
                                <p class="h-12 px-2 text-xs">{{ $champion->title }}</p>
                                <div class="text-xs text-left">
                                    <p><span class="font-bold">Resource: </span>{{ $champion->partype }}<p>
                                    <p>
                                        {{ $champion->attack }}<span class="font-bold">atk</span>
                                        {{ $champion->defense }}<span class="font-bold">def</span>
                                        {{ $champion->magic }}<span class="font-bold">mag</span>
                                        {{ $champion->difficulty }}<span class="font-bold"> difficulty</span>
                                    <p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
