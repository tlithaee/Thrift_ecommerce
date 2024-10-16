<div class="flex items-center justify-between mb-4">
    <div class="flex items-center">
        <img src="{{ $order->image }}" class="h-16 w-16 object-cover rounded-md mr-4" alt="Product Image">
        <div>
            <h5 class="text-lg font-medium">{{ $order->title }}</h5>
            <p class="text-gray-500">{{ $order->size }}</p>
        </div>
    </div>
    <div class="text-right">
        <p class="text-lg font-bold">${{ $order->price }}</p>
        <p class="text-sm line-through text-gray-400">${{ $order->original_price }}</p>
    </div>
</div>