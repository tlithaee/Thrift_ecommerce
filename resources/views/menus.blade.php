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

                            <div class="mx-auto mb-2 w-10/12">
                                <button onclick="showAddToCartOptions({{ $menu->id }})" id="add-btn-{{ $menu->id }}" class="w-full py-2 bg-gray-100 text-xs uppercase transition group-hover:bg-emerald-600 group-hover:text-white rounded-md">
                                    Add
                                </button>
                                
                                <div id="cart-options-{{ $menu->id }}" class="hidden">
                                    <!-- Counter -->
                                    <div class="flex items-center justify-between w-full mb-2">
                                        <button onclick="decreaseQuantity({{ $menu->id }})" class="flex items-center justify-center bg-gray-200 px-3 py-2 transition hover:bg-emerald-500 hover:text-white rounded-l-md">-</button>
                                        <span id="quantity-{{ $menu->id }}" class="px-4 py-2 bg-gray-100">1</span>
                                        <button onclick="increaseQuantity({{ $menu->id }})" class="flex items-center justify-center bg-gray-200 px-3 py-2 transition hover:bg-emerald-500 hover:text-white rounded-r-md">+</button>
                                    </div>

                                    <!-- Add to Cart Button -->
                                    <button class="add-to-cart w-full py-2 bg-emerald-600 text-white text-xs uppercase transition hover:bg-emerald-700 rounded-md"
                                        data-menu-id="{{ $menu->id }}" data-menu-name="{{ $menu->food_name }}">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Popup Notification -->
        <div id="popup-notification" class="fixed bottom-10 right-10 bg-green-600 text-white p-4 rounded-md shadow-lg opacity-0 transition-opacity duration-300" style="z-index: 1000;">
            <p id="popup-message"></p>
        </div>
    </section>

    <!-- JavaScript for handling UI and AJAX requests -->
    <script>
        function showAddToCartOptions(menuId) {
            document.getElementById('add-btn-' + menuId).classList.add('hidden');
            document.getElementById('cart-options-' + menuId).classList.remove('hidden');
        }

        function increaseQuantity(menuId) {
            let quantityElement = document.getElementById('quantity-' + menuId);
            let currentQuantity = parseInt(quantityElement.innerText);
            quantityElement.innerText = currentQuantity + 1;
        }

        function decreaseQuantity(menuId) {
            let quantityElement = document.getElementById('quantity-' + menuId);
            let currentQuantity = parseInt(quantityElement.innerText);
            if (currentQuantity > 1) {
                quantityElement.innerText = currentQuantity - 1;
            }
        }

        // Add to Cart using AJAX
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                const menuId = this.getAttribute('data-menu-id');
                const menuName = this.getAttribute('data-menu-name');
                const quantity = document.getElementById('quantity-' + menuId).innerText;

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
                        // Reset the UI after successful addition
                        document.getElementById('cart-options-' + menuId).classList.add('hidden');
                        document.getElementById('add-btn-' + menuId).classList.remove('hidden');
                        document.getElementById('quantity-' + menuId).innerText = '1';
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });

        // Show popup notification
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