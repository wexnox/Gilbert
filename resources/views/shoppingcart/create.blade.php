{{--@php--}}
{{--    $disabled = $errors->any() || empty($this->name) || empty($this->excerpt) || empty($this->description) ? true : false;--}}
{{--@endphp--}}
<x-app-layout>


    <x-slot name="title">
        {{ __('Create a shopping cart') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Shopping Cart') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col  items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h1 class="mb-6 mt-6">Create your shopping card</h1>
            {{--            <x-jet-validation-errors class="mb-4" />--}}
            <form action="{{ route("shoppingcart.store") }}" method="POST">
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

                <div class="flex items-center justify-end mt-4">
                    <x-buttons.primary class="ml-4"
                            {{--                                       wire:loading.attr="disabled" :disabled="$disabled"--}}
                    >
                        {{ __('Add shopping cart') }}
                    </x-buttons.primary>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>78