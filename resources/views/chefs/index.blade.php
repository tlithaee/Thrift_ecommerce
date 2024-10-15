<x-layout>
    <div class="py-8 px-4 max-w-screen-xl lg:py-16 lg:px-6">
        <!-- Our Chefs Section -->
        <div class="max-w-screen-xl mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-green-900 text-left">Our Chefs</h2>
            <p class="font-light text-gray-500 lg:mb-16 sm:text-xl text-left">
                Meet the talented chefs behind our exquisite menu. Each of our chefs brings a unique set of skills and a passion for culinary perfection.
            </p>            
        </div>

        <!-- Pagination Links -->
        <div class="mt-6 mb-12"> <!-- Increased the bottom margin -->
            {{ $chefs->links() }}
        </div>

        <!-- Chef Card Section -->
        <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2 lg:grid-cols-3">
            @foreach($chefs as $chef)
                <div class="flex flex-col bg-gray-50 rounded-lg shadow h-full">
                    <img class="w-full h-64 object-cover rounded-t-lg" src="{{ asset($chef->photo) }}" alt="{{ $chef->name }}">
                    <div class="p-5 flex-grow flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold tracking-tight text-gray-900 mb-2">
                                {{ $chef->name }}
                            </h3>
                            <p class="mb-4 font-light text-gray-500">
                                {{ Str::limit($chef->bio, 100) }}
                            </p>
                        </div>
                        <p class="font-semibold text-green-700 mt-auto mb-2">
                            Specialty:
                        </p>
                        <span class="text-primary-800 text-xs font-medium rounded dark:text-primary-800">
                            @foreach ($chef->categories as $category)
                                <span class="bg-{{ $category->color }}-100 hover:underline px-2.5 py-0.5 rounded-full dark:bg-primary-200 mr-2 mb-2">
                                    {{ $category->category_name ?? 'No specialty assigned' }}
                                </span>
                            @endforeach
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
