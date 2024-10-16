<div class="bg-white rounded-lg shadow-md p-6">
    <h4 class="text-lg font-bold mb-4">Summary Order</h4> 
    <p class="text-gray-600 mb-6">Check your item and select your shipping for a better experience order item.</p>
    
    @foreach ($orders as $order)
        <div class="flex items-center mb-4">
            <img src="{{ $order->food_image }}" alt="Product Image" class="h-16 w-16 object-cover mr-4 rounded-lg">
            <div class="flex-grow">
                <h5 class="font-semibold text-gray-800">{{ $order->food_name }}</h5>
                <p class="text-lg font-bold text-gray-900 mt-1">Rp. {{ $order->price }}</p>
                <div class="flex items-center mt-1">
                    <p class="text-l text-gray-900">Quantity: {{ $order->pivot->quantity }}</p>
                    <form action="/order/menu/{{ $order->id }}/increment" method="POST" class="ml-2">
                        @csrf
                        <button type="submit" class="bg-gray-300 px-2 py-1 rounded">+</button>
                    </form>
                    <form action="/order/menu/{{ $order->id }}/decrement" method="POST" class="ml-2">
                        @csrf
                        <button type="submit" class="bg-gray-300 px-2 py-1 rounded">-</button>
                    </form>
                </div>
            </div>
            <form action="/order/menu/{{ $order->id }}" method="POST" class="ml-auto">
                @csrf
                <button type="submit" class="text-red-600">Delete</button>
            </form>
        </div>
    @endforeach
</div>
