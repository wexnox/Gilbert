<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="POST" action="{{ route('recipe.store') }}">
                    @csrf
                    <di>
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofucus autocomplete="name" />
                    </di>
                    <x-jet-button class="ml-4">
                        {{ __('Create') }}
                    </x-jet-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
