<x-layout>
    <div class="h-auto overflow-hidden">
        <div class="pt-16 flex justify-center">
            <!-- Back Button -->
            <div class="absolute top-24 left-24">
                <button onclick="window.history.back()" class="flex items-center text-white bg-green-600 rounded hover:bg-green-700 transition p-2">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                    </svg>
                </button>

            </div>

            <div class="flex-none w-full py-8 px-2 bg-gray-100 rounded-xl shadow-md overflow-hidden flex">
                <!-- Menu Image -->
                <div class="max-w-md sm:px-6 lg:px-8 flex-none">
                    <img src="{{ $menu->food_image }}" alt="{{ $menu->food_name }}" class="h-full w-full object-cover object-center rounded-lg">
                </div>

                <!-- Menu Details -->
                <div class="flex flex-col justify-between p-10 w-full">
                    <div>
                        <div class="my-2">
                            <p class="text-sm text-gray-600">{{ $menu->category->category_name }}</p>
                        </div>

                        <div class="flex items-center justify-between">
                            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $menu->food_name }}</h1>
                            <p class="text-xl tracking-tight text-gray-900">Rp.{{ number_format($menu->price, 2) }}</p>
                        </div>

                        <div class="mt-2">
                            <p class="text-sm text-gray-600">Chef: {{ $menu->chef->name }}</p>
                        </div>

                        <div class="py-2">
                            <div>
                                <p class="text-base text-gray-900">{{ $menu->description }}</p>
                            </div>

                            <div class="mt-4">
                                <h3 class="text-sm font-medium text-gray-900">Ingredients</h3>
                                <div class="mt-2">
                                    <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                                        @foreach(json_decode($menu->ingredients) as $ingredient)
                                        <li class="text-gray-400"><span class="text-gray-600">{{ $ingredient }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>