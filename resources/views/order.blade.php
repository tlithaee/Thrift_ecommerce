<x-layout>
    <section class="bg-white py-8 antialiased md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="flex items-center mb-4">
                <!-- Back Button -->
                <button onclick="window.history.back()" class="flex items-center text-white bg-green-600 rounded hover:bg-green-700 transition p-2">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                    </svg>
                </button>
                <h2 class="text-2xl font-semibold text-gray-900 sm:text-3xl ml-4">Your Shopping Cart</h2>
            </div>

            @if ($cart && $cart->cartItems->count() > 0)
            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                    <div class="space-y-6">
                        @foreach ($cart->cartItems as $cartItem)
                        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm md:p-6">
                            <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                <!-- Menu Image -->
                                <a href="/menus/{{ $cartItem->menu->slug }}" class="shrink-0 md:order-1">
                                    <img class="h-20 w-20" src="{{ $cartItem->menu->food_image }}" alt="{{ $cartItem->menu->food_name }}" />
                                </a>

                                <!-- Quantity Input -->
                                <label for="counter-input-{{ $cartItem->id }}" class="sr-only">Choose quantity:</label>
                                <div class="flex items-center justify-between md:order-3 md:justify-end">
                                    <div class="flex items-center">
                                        <form action="{{ route('cart.update', $cartItem->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="menu_id" value="{{ $cartItem->menu_id }}">
                                            <button type="submit" name="decrement" class="inline-flex h-5 w-5 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none">
                                                <svg class="h-2.5 w-2.5 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <input type="text" name="quantity" id="counter-input-{{ $cartItem->id }}" value="{{ $cartItem->quantity }}" class="w-10 text-center text-sm font-medium text-gray-900 focus:outline-none" readonly />
                                            <button type="submit" name="increment" class="inline-flex h-5 w-5 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none">
                                                <svg class="h-2.5 w-2.5 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="text-end md:order-4 md:w-32">
                                        <p class="text-base font-bold text-gray-900">Rp {{ number_format($cartItem->menu->price * $cartItem->quantity, 0, ',', '.') }}</p>
                                    </div>
                                </div>

                                <!-- Menu Information -->
                                <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                    <a href="/menus/{{ $cartItem->menu->slug }}" class="text-base font-medium text-gray-900 hover:underline">
                                        {{ $cartItem->menu->food_name }}
                                    </a>
                                    <p class="text-sm text-gray-500">{{ $cartItem->menu->category->category_name }}</p>

                                    <!-- Remove Button -->
                                    <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                                            <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L17.94 6M18 18L6.06 6" />
                                            </svg>
                                            Remove
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                    <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm sm:p-6">
                        <p class="text-xl font-semibold text-gray-900">Order Summary</p>

                        <div class="space-y-4">
                            <div class="space-y-2">
                                <!-- Original Price -->
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500">Original Price</dt>
                                    <dd class="text-base font-medium text-gray-900">Rp {{ number_format($cart->cartItems->sum(fn($item) => $item->menu->price * $item->quantity), 0, ',', '.') }}</dd>
                                </dl>
                                <!-- Delivery Cost -->
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500">Delivery Cost</dt>
                                    <dd class="text-base font-medium text-gray-900">Rp 0</dd>
                                </dl>

                                <!-- Line Separator -->
                                <hr class="border-gray-300">

                                <!-- Total Price -->
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-semibold text-gray-900">Total Price</dt>
                                    <dd class="text-base font-semibold text-gray-900">Rp {{ number_format($cart->cartItems->sum(fn($item) => $item->menu->price * $item->quantity), 0, ',', '.') }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <p class="text-gray-500">Your cart is empty.</p>
                @endif
            </div>
            <div class="font-[sans-serif] bg-white">
                <div class="flex max-sm:flex-col gap-12 max-lg:gap-4 h-full">
                    <div class="max-w-4xl w-full h-max rounded-md px-4 py-4 sticky top-0">
                        <div>
                          <h3 class="text-base text-green-800 mb-4"><b>Personal Details</b></h3>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <input type="text" name="first_name" placeholder="First Name"
                                        value="{{ Auth::user() ? explode(' ', Auth::user()->name)[0] : '' }}"
                                        class="px-4 py-3 bg-gray-100 text-gray-600 w-full text-sm rounded-md focus:outline-none cursor-not-allowed opacity-75" readonly />
                                </div>

                                <div>
                                    <input type="text" name="last_name" placeholder="Last Name"
                                        value="{{ Auth::user() ? implode(' ', array_slice(explode(' ', Auth::user()->name), 1)) : '' }}"
                                        class="px-4 py-3 bg-gray-100 text-gray-600 w-full text-sm rounded-md focus:outline-none cursor-not-allowed opacity-75" readonly />
                                </div>

                                <div>
                                    <input type="email" name="email" placeholder="Email"
                                        value="{{ Auth::user() ? Auth::user()->email : '' }}"
                                        class="px-4 py-3 bg-gray-100 text-gray-600 w-full text-sm rounded-md focus:outline-none cursor-not-allowed opacity-75" readonly />
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('order.store') }}" method="POST" class="mt-8">
                          @csrf
                          <div class="mt-8">
                              <h3 class="text-base text-green-800 mb-4"><b>Shipping Address</b></h3>
                              <div class="grid md:grid-cols-2 gap-4">
                                  <div>
                                      <input type="text" name="address_line" placeholder="Address Line" required
                                             class="px-4 py-3 bg-gray-100 focus:bg-transparent text-gray-800 w-full text-sm rounded-md focus:outline-green-600" />
                                  </div>
                                  <div>
                                      <input type="text" name="city" placeholder="City" required
                                             class="px-4 py-3 bg-gray-100 focus:bg-transparent text-gray-800 w-full text-sm rounded-md focus:outline-green-600" />
                                  </div>
                                  <div>
                                      <input type="text" name="state" placeholder="State" required
                                             class="px-4 py-3 bg-gray-100 focus:bg-transparent text-gray-800 w-full text-sm rounded-md focus:outline-green-600" />
                                  </div>
                                  <div>
                                      <input type="text" name="zip_code" placeholder="Zip Code" required
                                             class="px-4 py-3 bg-gray-100 focus:bg-transparent text-gray-800 w-full text-sm rounded-md focus:outline-green-600" />
                                  </div>
                                  <div>
                                      <input type="text" name="phone_number" placeholder="Phone Number" required
                                             class="px-4 py-3 bg-gray-100 focus:bg-transparent text-gray-800 w-full text-sm rounded-md focus:outline-green-600" />
                                  </div>
                              </div>
                              <div class="flex gap-4 max-md:flex-col mt-8">
                                  <button type="submit" class="rounded-md px-6 py-3 w-full text-sm tracking-wide bg-green-600 hover:bg-green-700 text-white">
                                      Continue to Order
                                  </button>
                              </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</x-layout>
