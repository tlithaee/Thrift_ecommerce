<div class="border rounded-lg p-4 mb-2 {{ $method['selected'] ? 'border-black' : 'border-gray-300' }}">
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <img src="{{ $method['logo'] }}" class="h-8 w-8 object-contain mr-4" alt="Shipping Logo">
            <div>
                <h6 class="font-medium">{{ $method['name'] }}</h6>
                <p class="text-sm text-gray-500">{{ $method['description'] }}</p>
            </div>
        </div>
        <div class="text-right">
            <p class="text-lg font-bold">{{ $method['price'] }}</p>
        </div>
    </div>
</div>