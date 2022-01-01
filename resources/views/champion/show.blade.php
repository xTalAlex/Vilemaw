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

                <div class="flex justify-between px-4">
                    <div class="py-2 text-xs space-y-0.5">
                        <p>Range - {{ $champion->stats->attackrange }}</p>
                        <p>Movement - {{ $champion->stats->movespeed }}</p>
                        <p>HP - {{ $champion->stats->hp }} (+{{ $champion->stats->hpperlevel }})</p>
                        <p>MP - {{ $champion->stats->mp }} (+{{ $champion->stats->hpperlevel }})</p>
                        <p>HPreg - {{ $champion->stats->hpregen }} (+{{ $champion->stats->hpregenperlevel }})</p>
                        <p>MPreg - {{ $champion->stats->mpregen }} (+{{ $champion->stats->mpregenperlevel }})</p>
                        <p>Armor - {{ $champion->stats->armor }} (+{{ $champion->stats->armorperlevel }})</p>
                        <p>MagicRes - {{ $champion->stats->spellblock }} (+{{ $champion->stats->spellblockperlevel }})</p>
                        <p>Damage - {{ $champion->stats->attackdamage }} (+{{ $champion->stats->attackdamageperlevel }})</p>
                        <p>AttackSpeed - {{ $champion->stats->attackspeed }} (+{{ $champion->stats->attackspeedperlevel }})</p>
                        <p>Crit - {{ $champion->stats->crit }} (+{{ $champion->stats->critperlevel }})</p>
                    </div>

                    <div>
                        <p class="">
                            {{ $champion->attack }}<span class="font-bold"> Atk</span>
                            {{ $champion->defense }}<span class="font-bold"> Def</span>
                            {{ $champion->magic }}<span class="font-bold"> Mag</span>                                   
                        </p>
                        <p>
                            <span class="font-bold">Difficulty </span>{{ $champion->difficulty }}
                        </p>
                    </div>
                </div>

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
