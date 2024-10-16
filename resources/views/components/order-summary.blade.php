<div class="bg-white rounded-lg shadow-md p-6">
    <h4 class="text-lg font-bold mb-4">Summary Order</h4> 
    <p class="text-gray-600 mb-6">Check your item and select your shipping for a better experience order item.</p>
    
    @foreach ($orders as $order)
        <div class="flex items-center mb-4">
            
            <img src="{{ $order->food_image }}" alt="Product Image" class="h-16 w-16 object-cover mr-4 rounded-lg">
            <div class="flex-grow">
                <h5 class="font-semibold text-gray-800">{{ $order->food_name }}</h5>
                <p class="text-lg font-bold text-gray-900 mt-1">Rp. {{ $order->price }}</p>
            </div>
        </div>
    @endforeach
</div>