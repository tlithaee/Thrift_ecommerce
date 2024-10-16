<div class="bg-white rounded-lg shadow-md p-6">
    <h4 class="text-lg font-bold mb-4">Summary Order</h4>
    <p class="text-gray-600 mb-6">Check your item and select your shipping for a better experience order item.</p>
    
    @foreach ($orders as $order)
        <x-order-card :order="$order" />
    @endforeach
    
    {{-- <h5 class="text-md font-semibold mt-6 mb-2">Available Shipping Method</h5>
    <div class="mb-4">
        <x-shipping-method :method="$shippingMethods['domestic']" />
    </div>
    
    <h5 class="text-md font-semibold mt-4 mb-2">Available International Shipping</h5>
    <x-shipping-method :method="$shippingMethods['international']" /> --}}
</div>