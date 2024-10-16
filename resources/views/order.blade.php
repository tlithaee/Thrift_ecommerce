<x-layout>
    <div class="container mx-auto p-20">
        <h3 class="text-4xl font-bold mb-6 text-green-800">Order Overview</h3>
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="w-full lg:w-2/5">
                <x-order-summary :orders="$orders" />
            </div>  

            <div class="w-full lg:w-3/5">
                <x-payment-details :total="$total" />
            </div>
        </div>
        
    </div>
</x-layout>