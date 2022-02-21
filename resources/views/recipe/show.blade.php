<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white rounded shadow-xl sm:rounded-lg">
                {{--TODO: Sette inn dummy bilde--}}
                <img class="max-h-" src=" {{ $recipe->images }}" alt="Sunset in the mountains">
                {{-- TODO: Her skal det emne knapper--}}
                <div class="px-6 pt-4 pb-2 text-right">
                    <span
                            class="inline-block px-3 py-1 mr-2 mb-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">#photography</span>
                    <span
                            class="inline-block px-3 py-1 mr-2 mb-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">#travel</span>
                    <span
                            class="inline-block px-3 py-1 mr-2 mb-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-full">#winter</span>
                </div>
                <div class="px-6 py-4">
                    <h1 class="mb-2 text-2xl font-bold text-center">{{ $recipe->name }}</h1>
                    <div class="text-base text-center text-gray-700">
                        <p class="text-base">{{ $recipe->ingredients }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>


</x-app-layout>
