<x-layout>
    <div class="h-auto overflow-hidden pt-16">
        <div class="flex justify-center">
            <div class="w-full py-8 px-2 bg-gray-100 rounded-xl shadow-md overflow-hidden">

                <div class="flex items-start px-6"> 
                    <!-- Back Button -->
                    <div class="flex-none"> 
                        <button onclick="window.history.back()" class="flex items-center text-white bg-green-600 rounded hover:bg-green-700 transition p-2">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                            </svg>
                        </button>
                    </div>

                    <!-- Content: Image and Menu Details -->
                    <div class="flex flex-col sm:flex-row w-full">
                        <!-- Menu Image -->
                        <div class="relative flex-none max-w-md sm:px-6 lg:px-8">
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

                                <div class="mt-4 flex items-center">
                                    <p class="text-gray-600 font-semibold mr-2">Chef:</p>
                                    <div class="flex items-center bg-green-100 text-green-800 px-2 py-0.5 rounded-lg hover:bg-green-200 transition duration-300">
                                        <img src="{{ asset($menu->chef->photo) }}" alt="{{ $menu->chef->name }}" class="w-8 h-8 object-cover rounded-full mr-2">
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

                                    <!-- Add to Cart Section -->
                                    <div class="flex items-center mt-10">
                                        <button id="add-to-cart-btn" onclick="addToCart()" class="px-20 bg-green-600 text-white font-bold py-2 rounded hover:bg-green-700 transition">Add to Cart</button>
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
        </div>
    </div>

    <!-- Popup Notification -->
    <div id="popup-notification" class="fixed bottom-10 right-10 bg-green-600 text-white p-4 rounded-md shadow-lg opacity-0 transition-opacity duration-300" style="z-index: 1000;">
        <p id="popup-message"></p>
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

        function addToCart() {
            const menuId = {{ $menu->id }};
            const menuName = "{{ $menu->food_name }}";
            const quantity = document.getElementById('counter').value;

            // Send the AJAX request to add the menu to cart
            fetch(`/cart/add/${menuId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ quantity: quantity })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showPopupNotification(`${menuName} has been added to your cart!`);
                    // Reset the counter to 1 after successful addition
                    document.getElementById('counter').value = '1';
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function showPopupNotification(message) {
            const popup = document.getElementById('popup-notification');
            const popupMessage = document.getElementById('popup-message');

            popupMessage.textContent = message;
            popup.classList.remove('opacity-0');
            popup.classList.add('opacity-100');

            // Hide the popup after 3 seconds
            setTimeout(() => {
                popup.classList.remove('opacity-100');
                popup.classList.add('opacity-0');
            }, 3000);
        }
    </script>
</x-layout>
