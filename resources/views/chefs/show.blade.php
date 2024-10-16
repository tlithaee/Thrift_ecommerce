<x-layout>
    <div class="py-8 px-4 max-w-screen-xl lg:py-16 lg:px-6">
        <!-- Back Button -->
        <div class="flex items-center mb-4">
            <button onclick="window.history.back()" class="flex items-center text-white bg-green-600 rounded hover:bg-green-700 transition p-2">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                </svg>
            </button>
            <h2 class="text-4xl tracking-tight font-extrabold text-green-900 text-left ml-4">{{ $chef->name }}</h2>
        </div>

        <div class="flex flex-col md:flex-row gap-8">
            <div class="md:w-1/3">
                <img class="w-full h-auto object-cover rounded-lg mb-4" src="{{ asset($chef->photo) }}" alt="{{ $chef->name }}">
            </div>
            <div class="md:w-2/3">
                <p class="font-light text-gray-500 text-base mb-4">{{ $chef->bio }}</p>
            </div>
        </div>

        <!-- Chef Specialties Section -->
        <div class="mt-8">
            <p class="font-semibold text-green-700 mb-2">Specialty:</p>
            <div class="flex flex-wrap">
                @foreach ($chef->categories as $category)
                    <span class="bg-{{ $category->color }}-100 hover:underline px-3 py-1 rounded-full dark:bg-primary-200 mr-2 mb-2 text-sm">
                        {{ $category->specialty_name ?? 'No specialty assigned' }}
                    </span>
                @endforeach
            </div>
        </div>

        <!-- Signature Dish Section -->
        <div class="mt-12">
            <p class="font-semibold text-green-700 mb-2">Signature Dishes:</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($chef->menus as $menu)
                    <a href="/menus/{{ $menu->slug }}" class="border rounded-lg overflow-hidden hover:shadow-lg transition duration-300">
                        <img class="w-full h-48 object-cover" src="{{ asset($menu->food_image) }}" alt="{{ $menu->food_name }}">
                        <div class="p-4">
                            <h3 class="font-bold text-lg text-green-900 hover:underline">{{ $menu->food_name }}</h3>
                            <p class="text-sm text-gray-500 mt-2">{{ $menu->description }}</p>
                            <p class="text-sm text-gray-700 mt-2 font-semibold">Price: Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

</x-layout>
