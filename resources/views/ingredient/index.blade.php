<x-app-layout>

    <x-slot name="title">
        {{ __('Ingredients') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Ingredient') }}
        </h2>
    </x-slot>
    <div class="container my-12 mx-auto px-4 md:px-12">
        <x-jet-button class="ml-4">
            <a class="" href="{{route('ingredients.create')}}">Add new ingredient</a>
        </x-jet-button>

        <div class="flex flex-wrap -mx-1 lg:-mx-4">
        {{-- TODO: Convert to blade component--}}
        @foreach($ingredients as $ingredient)
            <!-- Column -->
                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                    <!-- Article -->
                    <article class="overflow-hidden rounded-lg shadow-lg">

                        <a href="{{ route('ingredients.show' , $ingredient->id) }}">
                            <img alt="{{ $ingredient->name }}" class="block h-auto w-full  " src="{{ $ingredient->images }}">
                        </a>
                        <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                            <h1 class="text-lg">
                                <a class="no-underline hover:underline text-black" href="#">
                                    {{ $ingredient->name }}
                                </a>
                            </h1>
                            <p class="text-grey-darker text-sm">
                                Published @ {{ $ingredient->created_at }}
                            </p>
                        </header>
                        <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                            <a class="flex items-center no-underline hover:underline text-black" href="{{ route('ingredients.show' , $ingredient->id) }}">
                                <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                                <p class="ml-2 text-sm">
                                    Author Name
                                </p>
                            </a>
                            <a class="no-underline text-grey-darker hover:text-red-dark" href="{{ route('ingredients.show' , $ingredient->id) }}">
                                <span class="hidden">Like</span>
                                <i class="fa fa-heart"></i>
                            </a>
                        </footer>
                    </article>
                    <!-- END Article -->

                </div>
                <!-- END Column -->
            @endforeach

        </div>
        {{ $ingredients->links() }}
        {{-- Card --}}
        <x-partials.card class="w-72 bg-blue-200">
            {{-- Image --}}
            <x-slot name="image">
                <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
            </x-slot>
            {{-- Title --}}
            <x-slot name="title" class="font-bold text-blue-500 uppercase">
                Test slot title
            </x-slot>
            {{-- Body --}}
            <x-slot name="body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque, ipsa.
            </x-slot>
        </x-partials.card>
    </div>
</x-app-layout>

{{-- Seach box --}}
{{-- Order by--}}
{{-- Irder Asc --}}
{{-- Per Page --}}