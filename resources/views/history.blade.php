<x-layout>
    <section class="py-20 relative">
        <div class="w-full max-w-7xl mx-auto px-4 md:px-8">
            <div class="max-w-screen-xl mb-2 lg:mb-6">
                <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-green-900 text-left">Order History</h2>

                <!-- Pagination Links -->
                <div class="mt-6">
                    {{ $transactions->links('pagination::tailwind') }} <!-- This will generate pagination controls -->
                </div>
            </div>

            <!-- Check if the user has transactions -->
            @if ($transactions->count() > 0)
                @foreach ($transactions as $transaction)
                    <!-- Transaction Card -->
                    <div id="transaction-{{ $transaction->id }}" 
                        class="border border-gray-200 rounded-lg shadow-md pt-4 mb-6
                        @if($transaction->status === 'pending') hover:cursor-pointer @endif" 
                        @if($transaction->status === 'pending') 
                            onclick="window.location.href='{{ route('transaction.updatePaymentMethod', $transaction->id) }}'"
                        @endif>
                        <div class="flex justify-between items-center px-3 md:px-11">
                            <div>
                                <!-- Dynamic Order Number and Date -->
                                <p class="font-medium text-md leading-8 text-black whitespace-nowrap">
                                    Order Number: <span class="text-green-600">#{{ $transaction->id }}</span>
                                </p>
                                <p class="font-medium text-md leading-8 text-black whitespace-nowrap">
                                    Order Date: <span class="text-green-600">{{ $transaction->created_at->format('d M Y') }}</span>
                                </p>
                            </div>
                            <div class="text-right">
                                <!-- Conditional Status Color and Hover Underline for Pending -->
                                <p class="font-normal text-md text-gray-500">Status</p>
                                <p class="font-semibold text-lg
                                    @if ($transaction->status === 'pending')
                                        text-yellow-500 hover:underline cursor-pointer
                                    @else
                                        text-green-500
                                    @endif"
                                    @if ($transaction->status === 'pending')
                                        onclick="window.location.href='{{ route('transaction.summary', $transaction->id) }}'"
                                    @endif
                                >
                                    {{ ucfirst($transaction->status) }}
                                </p>

                            </div>
                        </div>
                        <hr class="my-4 w-full border-t border-gray-300" />

                        <!-- Transaction Items (Show 1 by default, hide the rest) -->
                        <div class="px-3 md:px-11">
                            @foreach ($transaction->transactionItems->take(1) as $item) <!-- Show only the first item -->
                            <div class="grid grid-cols-12 gap-6 items-start">
                                <div class="col-span-12 sm:col-span-2">
                                    <!-- Dynamic Product Image -->
                                    <img src="{{ $item->menu->food_image }}" alt="{{ $item->menu->food_name }}" class="w-full object-cover rounded-md">
                                </div>
                                <div class="col-span-12 sm:col-span-6">
                                    <!-- Dynamic Product Name, Chef, and Quantity -->
                                    <h6 class="font-semibold text-lg text-black mb-1">{{ $item->menu->food_name }}</h6>
                                    <p class="text-sm text-gray-500 mb-1">Chef: {{ $item->menu->chef->name ?? 'Unknown Chef' }}</p>
                                    <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                                </div>
                                <div class="col-span-12 sm:col-span-4 text-right">
                                    <!-- Dynamic Product Price -->
                                    <p class="font-semibold text-lg text-black">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            @endforeach

                            <!-- Hidden items (dropdown functionality) -->
                            @if ($transaction->transactionItems->count() > 1)
                            <div id="additional-items-{{ $transaction->id }}" class="hidden">
                                @foreach ($transaction->transactionItems->slice(1) as $item) <!-- Display the remaining items -->
                                <hr class="my-4 w-full border-t border-gray-300" />
                                <div class="grid grid-cols-12 gap-6 items-start">
                                    <div class="col-span-12 sm:col-span-2">
                                        <img src="{{ $item->menu->food_image }}" alt="{{ $item->menu->food_name }}" class="w-full object-cover rounded-md">
                                    </div>
                                    <div class="col-span-12 sm:col-span-6">
                                        <h6 class="font-semibold text-lg text-black mb-1">{{ $item->menu->food_name }}</h6>
                                        <p class="text-sm text-gray-500 mb-1">Chef: {{ $item->menu->chef->name ?? 'Unknown Chef' }}</p>
                                        <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                                    </div>
                                    <div class="col-span-12 sm:col-span-4 text-right">
                                        <p class="font-semibold text-lg text-black">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <!-- Button to toggle the visibility of additional items with green "v" icon -->
                            <div class="text-center mt-4">
                            <!-- Adjust the button to be centered but not full width -->
                            <div class="flex justify-end">
                                <button id="toggle-items-btn-{{ $transaction->id }}" onclick="toggleItems({{ $transaction->id }})" 
                                class="bg-green-600 text-white text-center px-4 py-2 text-sm rounded-md hover:bg-green-700 transition">
                                <span>Show More</span>
                                    <svg id="toggle-icon-{{ $transaction->id }}" class="w-4 h-4 ml-1 inline-block transition-transform transform rotate-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            </div>
                            </div>
                            @endif
                        </div>
                        <hr class="my-4 w-full border-t border-gray-300" />

                        <!-- Total Price -->
                        <div class="px-3 pb-4 md:px-8 text-right">
                            <p class="font-medium text-md text-gray-700">Total Price: <span class="text-black">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</span></p>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-gray-500">You have no transaction history.</p>
            @endif
        </div>
    </section>

    <!-- JavaScript for Toggle Functionality -->
    <script>
        function toggleItems(transactionId) {
            var additionalItems = document.getElementById('additional-items-' + transactionId);
            var toggleBtn = document.getElementById('toggle-items-btn-' + transactionId);
            var toggleIcon = document.getElementById('toggle-icon-' + transactionId);

            if (additionalItems.classList.contains('hidden')) {
                additionalItems.classList.remove('hidden');
                toggleBtn.querySelector('span').innerText = 'Show Less';
                toggleIcon.classList.add('rotate-180'); // Rotate the "v" icon upside down
            } else {
                additionalItems.classList.add('hidden');
                toggleBtn.querySelector('span').innerText = 'Show More';
                toggleIcon.classList.remove('rotate-180'); // Rotate back to normal
            }
        }
    </script>
</x-layout>
