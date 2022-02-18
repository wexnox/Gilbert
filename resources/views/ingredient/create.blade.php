<x-app-layout>

    <x-slot name="title">
        {{ __('Add ingredients') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Ingredient') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col  items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h1>Create</h1>
            <x-jet-validation-errors class="mb-4" />
            <form action="{{ route("ingredients.store") }}" method="POST">
                @csrf

                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="excerpt" value="{{ __('Excerpt') }}" />
                    <x-jet-input id="excerpt" class="block mt-1 w-full" type="text" name="excerpt" :value="old('excerpt')" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="description" value="{{ __('Description') }}" />
                    <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" />
                </div>
                <div class="mt-4">
                    <x-jet-label for="amount" value="{{ __('Amount') }}" />
                    <x-jet-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="old('amount')" />
                </div>
                <div class="mt-4">
                    <x-jet-label for="quantity" value="{{ __('Quantity') }}" />
                    <x-jet-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" :value="old('quantity')" />
                </div>
                <div class="mt-4">
                    <x-jet-label for="images" value="{{ __('Images') }}" />
                    <x-jet-input id="images" class="block mt-1 w-full" type="text" name="images" :value="old('images')" />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="ml-4">
                        {{ __('Add ingredient') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>