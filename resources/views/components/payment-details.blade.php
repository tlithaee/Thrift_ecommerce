<div class="bg-white rounded-lg shadow-md p-6">
    <h4 class="text-lg font-bold mb-4">Payment Details</h4>
    <p class="text-gray-600 mb-6">Complete your purchase item by providing your payment details order.</p>

    <div class="space-y-4">
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" id="email" class="mt-1 block w-full border rounded-md p-2" placeholder="barlyvallendito@gmail.com">
        </div>
    </div>

    <div class="mt-6">
        <div class="flex justify-between text-lg font-semibold mt-4">
            
            <span>Total</span>
            <span>Rp. {{ $total }}</span>
        </div>
    </div>

    <form action="/order/submit" method="POST">
        @csrf
        <button type="submit" class="mt-6 w-full bg-black text-white py-3 rounded-lg font-semibold">Checkout</button>    
    </form>
    
</div>
