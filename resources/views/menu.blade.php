<x-layout>
    <div class="h-auto overflow-hidden">
        <div class="pt-16 flex justify-center">
            <!-- Card Container -->
            <div class="flex-none w-full py-8 px-2 bg-gray-100 rounded-xl shadow-md overflow-hidden flex">
                <!-- Menu Image -->
                <div class="relative flex-none max-w-md sm:px-6 lg:px-8">
                    <!-- Back Button -->
                    <div class="absolute top-2 left-2">
                        <button onclick="window.history.back()" class="flex items-center text-white bg-green-600 rounded hover:bg-green-700 transition p-2">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                            </svg>
                        </button>
                    </div>
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

                        <!-- Chef Section -->
                        <div class="mt-4 flex items-center">
                            <!-- "Chef:" Text -->
                            <p class="text-gray-600 font-semibold mr-2">Chef:</p>
                            <!-- Chef Name with Rounded Rectangle -->
                            <div class="flex items-center bg-green-100 text-green-800 px-2 py-0.5 rounded-lg hover:bg-green-200 transition duration-300">
                                <!-- Profile Picture -->
                                <img src="{{ asset($menu->chef->photo) }}" alt="{{ $menu->chef->name }}" class="w-8 h-8 object-cover rounded-full mr-2"> <!-- Adjusted sizes here -->
                                <!-- Chef Name -->
                                <a href="{{ route('chefs.show', $menu->chef->slug) }}" class="text-sm font-semibold hover:underline">
                                    {{ $menu->chef->name }}
                                </a>
                            </div>
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

                            <div class="flex items-center mt-10">
                                <x-primary-button class="px-52">Add to Cart</x-primary-button>
                                <div class="flex items-center ml-5">
                                    <button class="bg-gray-200 rounded-l px-4 py-2" onclick="decreaseCounter()">-</button>
                                    <input type="text" id="counter" value="1" class="w-12 text-center border rounded" readonly>
                                    <button class="bg-gray-200 rounded-r px-4 py-2" onclick="increaseCounter()">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function increaseCounter() {
            let counter = document.getElementById('counter');
            counter.value = parseInt(counter.value) + 1;
        }

        function decreaseCounter() {
            let counter = document.getElementById('counter');
            if (parseInt(counter.value) > 1) {
                counter.value = parseInt(counter.value) - 1;
            }
        }
    </script>
</x-layout>
