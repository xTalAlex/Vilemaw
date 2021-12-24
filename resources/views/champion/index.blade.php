<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Champions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="min-w-full p-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="w-full space-x-1">
                    @foreach (range('A', 'Z') as $char)
                        <a href="#{{$char}}" class="font-bold underline uppercase hover:no-underline hover:opacity-50">{{$char}}</a>
                    @endforeach
                </div>
                @foreach($champions_groups as $letter=>$champions)
                    <h2 class="mt-12 mb-2 ml-2 text-xl font-bold underline uppercase" id="{{$letter}}">{{$letter}}</h2>
                    <div class="grid grid-cols-6 gap-2 px-4 md:grid-cols-6">
                        @foreach($champions as $champion)
                            <div class="flex flex-col items-center justify-start col-span-1 py-2 space-y-2 text-center border rounded-lg shadow cursor-pointer bg-orange-50">
                                <p class="px-2 text-xs font-bold">{{ $champion->name }}</p>
                                <div class="relative w-16">
                                    <img src="{{ $champion->loading_image }}" class="w-full border">
                                    <div class="absolute border -bottom-1 -right-1">
                                        <img class="w-6 h-6" src="{{ $champion->passive->thumb_image }}">
                                    </div>
                                </div>
                                <div class="inline-flex mx-auto space-x-0.5">
                                    @foreach($champion->spells as $spell)
                                        <img class="w-6 h-6 border" src="{{ $spell->thumb_image }}">
                                    @endforeach
                                </div>
                                <p class="h-12 px-2 text-xs">{{ $champion->title }}</p>
                                <div class="px-1 text-xs text-left">
                                    <p><span class="font-bold">Resource: </span>{{ $champion->partype }}<p>
                                    <p class="font-bold">
                                        {{ $champion->attack }}<span class="font-bold">Atk</span>
                                        {{ $champion->defense }}<span class="font-bold">Def</span>
                                        {{ $champion->magic }}<span class="font-bold">Mag</span>                                   
                                    </p>
                                    <p>
                                        <span class="font-bold">Difficulty </span>{{ $champion->difficulty }}
                                    </p>
                                    <p class="mt-2 space-x-2 text-xs">
                                        @foreach($champion->tags as $tag)
                                            <span class="px-1 py-0.5 border rounded-lg">{{ $tag->name }} </span>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
