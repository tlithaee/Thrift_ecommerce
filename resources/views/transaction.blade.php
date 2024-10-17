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
                <h2 class="text-2xl font-semibold text-gray-900 sm:text-3xl ml-4">Order Summary</h2>
            </div>

            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                    <div class="space-y-6">
                        @foreach ($transaction->transactionItems as $item)
                        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm md:p-6">
                            <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                <a href="/menus/{{ $item->menu->slug }}" class="shrink-0 md:order-1">
                                    <img class="h-20 w-20" src="{{ $item->menu->food_image }}" alt="{{ $item->menu->food_name }}" />
                                </a>
                                <div class="text-end md:order-3 md:w-32">
                                    <p class="text-base font-bold text-gray-900">Rp {{ number_format($item->menu->price * $item->quantity, 0, ',', '.') }}</p>
                                </div>
                                <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                    <a href="/menus/{{ $item->menu->slug }}" class="text-base font-medium text-gray-900 hover:underline">
                                        {{ $item->menu->food_name }}
                                    </a>
                                    <p class="text-sm text-gray-500">{{ $item->menu->category->category_name }}</p>
                                    <p class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Payment & Shipping Summary -->
                <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                    <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm sm:p-6">
                        <p class="text-xl font-semibold text-gray-900">Payment & Shipping Details</p>

                        <div class="space-y-4">
                            <div class="space-y-2">
                                <div class="flex flex-col">
                                    <dl class="flex flex-wrap gap-1">
                                        <dt class="text-base font-normal text-gray-500 w-full mb-1">Shipping Address</dt>
                                        <dd class="text-base font-medium text-gray-900 w-full">{{ $transaction->address_line }}, {{ $transaction->city }}, {{ $transaction->state }}, {{ $transaction->zip_code }}</dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4 mt-2">
                                        <dt class="text-base font-normal text-gray-500">Phone Number</dt>
                                        <dd class="text-base font-medium text-gray-900">{{ $transaction->phone_number }}</dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4 mt-2">
                                        <dt class="text-base font-normal text-gray-500">Total Price</dt>
                                        <dd class="text-base font-medium text-gray-900">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</dd>
                                    </dl>
                                </div>

                                <!-- Payment Method Separator -->
                                <hr class="mt-8 mb-6 border-t-2 border-gray-200">

                                <!-- Payment Form -->
                                <form id="paymentForm" action="{{ route('transaction.updatePaymentMethod', $transaction->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                
                                    <h3 class="text-lg font-semibold text-gray-900">Payment Method</h3>
                                    <div class="space-y-4">
                                        <!-- Cash On Delivery Option -->
                                        <div class="flex items-center">
                                            <input type="radio" name="payment_method" id="cod" value="Cash On Delivery" class="h-4 w-4 text-green-600 border-gray-300 focus:ring-green-500" required>
                                            <label for="cod" class="ml-3 block text-sm font-medium text-gray-700 flex items-center">
                                                <img src="{{ asset('images/cod.png') }}" alt="Cash On Delivery" class="h-6 w-6 mr-2"> Cash On Delivery
                                            </label>
                                        </div>
                                        <!-- Gopay Option -->
                                        <div class="flex items-center">
                                            <input type="radio" name="payment_method" id="gopay" value="Gopay" class="h-4 w-4 text-green-600 border-gray-300 focus:ring-green-500">
                                            <label for="gopay" class="ml-3 block text-sm font-medium text-gray-700 flex items-center">
                                                <img src="{{ asset('images/gopay.png') }}" alt="Gopay" class="h-6 w-6 mr-2"> Gopay
                                            </label>
                                        </div>
                                        <!-- Ovo Option -->
                                        <div class="flex items-center">
                                            <input type="radio" name="payment_method" id="ovo" value="Ovo" class="h-4 w-4 text-green-600 border-gray-300 focus:ring-green-500">
                                            <label for="ovo" class="ml-3 block text-sm font-medium text-gray-700 flex items-center">
                                                <img src="{{ asset('images/ovo.png') }}" alt="Ovo" class="h-6 w-6 mr-2"> Ovo
                                            </label>
                                        </div>
                                    </div>
                                
                                    <!-- Button to proceed with payment -->
                                    <button type="button" id="payNowButton" class="mt-6 block w-full rounded-lg bg-green-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-700">
                                        Confirm Payment Method
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Success Popup (Hidden initially) -->
            <div id="paymentSuccessPopup" class="hidden fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-green-600 mb-4">Payment Successful!</h3>
                    <p class="text-gray-700">Your payment has been processed successfully.</p>
                    <button onclick="closePopup()" class="mt-4 bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">
                        Close
                    </button>
                </div>
            </div>

            <!-- JavaScript for Handling AJAX and Popup -->
            <script>
                document.getElementById('payNowButton').addEventListener('click', function() {
                    // Get the selected payment method
                    const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
                    if (!paymentMethod) {
                        alert('Please select a payment method!');
                        return;
                    }

                    // Get the form action URL
                    const actionUrl = document.getElementById('paymentForm').getAttribute('action');

                    // Make an AJAX request to process the payment method
                    fetch(actionUrl, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure CSRF token is included
                        },
                        body: JSON.stringify({
                            payment_method: paymentMethod.value
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Show the payment success popup
                            document.getElementById('paymentSuccessPopup').classList.remove('hidden');
                        } else {
                            alert('Payment failed, please try again.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
                });

                function closePopup() {
                    document.getElementById('paymentSuccessPopup').classList.add('hidden');
                    window.location.href = "{{ route('transaction.history') }}";
                }
            </script>
    </section>
</x-layout>
