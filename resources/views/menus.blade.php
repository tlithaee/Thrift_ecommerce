<x-layout>
    <section class="bg-white py-16 text-gray-700 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <h2 class="mb-7 text-4xl tracking-tight font-extrabold text-green-900 text-left">Categories</h2>

            <!-- Categories Section -->
            <div class="mt-2 grid grid-cols-2 gap-6 sm:grid-cols-4 sm:gap-4 lg:mt-4">
                @foreach ($categories as $category)
                <x-category-card :category="$category" />
                @endforeach
            </div>

            <!-- Recommended Menu Cards -->
            <div class="mt-10">
                <div class="max-w-screen-xl mb-2 lg:mb-6">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-green-900 text-left">Recommended Menus</h2>
                    <p class="font-light text-gray-500 lg:mb-6 sm:text-xl text-left">
                        Explore our carefully curated selection of recommended menus. Each dish is crafted with the finest ingredients and culinary expertise, promising a delightful dining experience.
                    </p>
                </div>
                <div class="mt-2 grid grid-cols-2 gap-6 sm:grid-cols-4 sm:gap-4 lg:mt-4">
                    @foreach ($menus->take(8) as $menu)
                    <article class="relative flex flex-col overflow-hidden rounded-lg border group">
                        <div class="aspect-square overflow-hidden relative">
                            <img class="h-full w-full object-cover transition-all duration-300 group-hover:scale-110" src="{{ $menu->food_image }}" alt="{{ $menu->food_name }}" />
                            <a href="/menus/{{ $menu->slug }}" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="text-lg font-regular">See Details</span>
                            </a>
                        </div>
                        <div class="my-4 mx-auto flex w-10/12 flex-col items-start justify-between">
                            <div class="mb-2 flex">
                                <p class="mr-3 text-sm font-semibold">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                            </div>
                            <h3 class="mb-2 text-sm text-gray-700">{{ $menu->food_name }}</h3>
                            <p class="text-sm text-gray-400">{{ $menu->category->category_name }}</p>
                        </div>
                        <button class="group mx-auto mb-2 flex h-10 w-10/12 items-stretch overflow-hidden rounded-md text-gray-600">
                            <div class="flex w-full items-center justify-center bg-gray-100 text-xs uppercase transition group-hover:bg-emerald-600 group-hover:text-white">Add</div>
                            <div class="flex items-center justify-center bg-gray-200 px-5 transition group-hover:bg-emerald-500 group-hover:text-white">+</div>
                        </button>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layout>