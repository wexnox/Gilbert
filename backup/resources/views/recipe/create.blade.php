<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col  items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h1>Create a new recipe</h1>

            <x-jet-validation-errors class="mb-4"/>

            <form action="POST" action="{{ route('recipes.store') }}">

                @csrf

                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}"/>
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofucus autocomplete="name"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="excerpt" value="{{ __('Excerpt') }}"/>
                    <x-jet-input id="excerpt" class="block mt-1 w-full" type="text" name="excerpt" :value="old('excerpt')"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="description" value="{{ __('Description') }}"/>
                    <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="ingredients" value="{{ __('Ingredients') }}"/>
                    <x-jet-input id="ingredients" class="block mt-1 w-full" type="text" name="ingredients" :value="old('ingredients')"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="images" value="{{ __('Images') }}"/>
                    <x-jet-input id="images" class="block mt-1 w-full" type="text" name="images" :value="old('images')"/>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-buttons.primary class="ml-4">
                        {{ __('Create') }}
                    </x-buttons.primary>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>
