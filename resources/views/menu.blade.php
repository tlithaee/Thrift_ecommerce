<x-layout>
    <div class="h-auto overflow-hidden">
        <div class="pt-16 flex justify-center">
            <div class="flex-none w-full py-8 px-2 bg-gray-100 rounded-xl shadow-md overflow-hidden flex">
                <!-- Image gallery -->
                <div class="max-w-md sm:px-6 lg:px-8 flex-none">
                    <img src="{{ $menu->food_image }}" alt="{{ $menu->food_name }}" class="h-full w-full object-cover object-center rounded-lg">
                </div>

                <!-- Product info -->
                <div class="flex flex-col justify-between p-10 w-full">
                    <div>
                        <!-- Wrap title, price, chef name, and category in a flexbox -->
                        <div class="my-2">
                            <p class="text-sm text-gray-600">{{ $menu->category }}</p>
                        </div>

                        <div class="flex items-center justify-between">
                            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $menu->food_name }}</h1>
                            <p class="text-xl tracking-tight text-gray-900">Rp.{{ number_format($menu->price, 2) }}</p> <!-- Price -->
                        </div>

                        <div class="mt-2">
                            <p class="text-sm text-gray-600">Chef: {{ $menu->chef_name }}</p>
                        </div>

                        <div class="py-2">
                            <!-- Description and details -->
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