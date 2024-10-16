<x-layout>
    <section class="bg-white py-12 text-gray-700 sm:py-16 lg:py-20">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center mb-4">
                <button onclick="window.history.back()" class="flex items-center text-white bg-green-600 rounded hover:bg-green-700 transition p-2">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                    </svg>
                </button>
                <h2 class="text-4xl tracking-tight font-extrabold text-green-900 text-left ml-4">{{ $category->category_name }}</h2>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $menus->links() }}
            </div>

            <!-- Menu Cards -->
            <div class="mt-10">
                @if ($menus->isEmpty())
                <div class="flex items-center justify-center h-64">
                    <p class="text-lg font-medium text-gray-600">No food items available here.</p>
                </div>
                @else
                <div class="mt-2 grid grid-cols-2 gap-6 sm:grid-cols-4 sm:gap-4 lg:mt-4">
                    @foreach ($menus as $menu)
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
                        <form action="/order/{{ $menu->slug }}" method="POST" class="w-full">
                            @csrf
                            <button type="submit" class="group mx-auto mb-2 flex h-10 w-10/12 items-stretch overflow-hidden rounded-md text-gray-600">
                                <div class="flex w-full items-center justify-center bg-gray-100 text-xs uppercase transition group-hover:bg-emerald-600 group-hover:text-white">
                                    Add
                                </div>
                            </button>
                        </form>  
                    </article>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </section>
</x-layout>