<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Recipe') }}
        </h2>
    </x-slot>


    <div class="container my-12 mx-auto px-4 md:px-12">
        <x-jet-button class="ml-4">
            <a class="" href="{{route('recipes.create')}}">Create a new recipe</a>
        </x-jet-button>
        <div class="flex flex-wrap -mx-1 lg:-mx-4">

        @foreach($recipes as $recipe)
            <!-- Column -->
                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                    <!-- Article -->
                    <article class="overflow-hidden rounded-lg shadow-lg">

                        <a href="{{ route('recipes.show' , $recipe->id) }}">
                            <img alt="{{ $recipe->name }}" class="block h-auto w-full  " src="{{ $recipe->images }}">
                        </a>

                        <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                            <h1 class="text-lg">
                                <a class="no-underline hover:underline text-black" href="#">
                                    {{ $recipe->name }}
                                </a>
                            </h1>
                            <p class="text-grey-darker text-sm">
                                Published @ {{ $recipe->created_at }}
                            </p>
                        </header>

                        <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                            <a class="flex items-center no-underline hover:underline text-black" href="{{ route('recipes.show' , $recipe->id) }}">
                                <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random">
                                <p class="ml-2 text-sm">
                                    Author Name
                                </p>
                            </a>
                            <a class="no-underline text-grey-darker hover:text-red-dark" href="{{ route('recipes.show' , $recipe->id) }}">
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
        {{ $recipes->links() }}
    </div>

</x-app-layout>