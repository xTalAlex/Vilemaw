<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Icons') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="min-w-full p-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-6 gap-2 px-4 md:grid-cols-12">
                @foreach($icons as $icon)
                   <div class="col-span-1">
                        <img class="w-24" src="{{ $icon->image_path }}">
                   </div> 
                @endforeach
                </div>
                <div class="mt-10">
                    {{ $icons->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
