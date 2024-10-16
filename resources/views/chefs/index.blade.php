<x-layout>
    <div class="py-8 px-4 max-w-screen-xl lg:py-16 lg:px-6">
        <!-- Our Chefs Section -->
        <div class="max-w-screen-xl mb-8 lg:mb-16">
            @if(isset($category))
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-green-900 text-left">
                    Chefs Specializing in {{ $category->category_name }}
                </h2>
            @else
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-green-900 text-left">Our Chefs</h2>
            @endif
            <p class="font-light text-gray-500 lg:mb-16 sm:text-xl text-left">
                Meet the talented chefs behind our exquisite menu. Each of our chefs brings a unique set of skills and a passion for culinary perfection.
            </p>            
        </div>

        <!-- Filter Section -->
        <p class="text-lg font-semibold text-green-900 mb-4">Filter based on the specialty here:</p>
        <div class="flex items-center w-40">
            <select name="category" id="category" class="border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" onchange="redirectToCategory(this)">
                <option value="">All Categories</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->slug }}" {{ isset($category) && $category->slug == $cat->slug ? 'selected' : '' }}>
                        {{ $cat->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Pagination Links -->
        <div class="mt-6 mb-12">
            {{ $chefs->appends(request()->input())->links() }}
        </div>

        <!-- Chef Card Section -->
        <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2 lg:grid-cols-3">
            @foreach($chefs as $chef)
                <!-- Wrap the chef card inside an anchor tag to make it clickable -->
                <a href="{{ route('chefs.show', $chef->slug) }}" class="flex flex-col bg-gray-50 rounded-lg shadow h-full hover:shadow-lg transition-shadow duration-300">
                    <img class="w-full h-64 object-cover rounded-t-lg" src="{{ asset($chef->photo) }}" alt="{{ $chef->name }}">
                    <div class="p-5 flex-grow flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold tracking-tight text-gray-900 mb-2">{{ $chef->name }}</h3>
                            <p class="mb-4 font-light text-gray-500">{{ Str::limit($chef->bio, 100) }}</p>
                        </div>
                        <div class="mt-2">
                            <p class="font-semibold text-green-700 mb-1">Specialty:</p>
                            <div class="flex flex-wrap">
                                @foreach ($chef->categories as $category)
                                    <span class="bg-{{ $category->color }}-100 hover:underline px-2 py-0.5 rounded-full dark:bg-primary-200 mr-2 mb-2 text-xs">
                                        {{ $category->specialty_name ?? 'No specialty assigned' }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Include the filter JavaScript -->
    <script src="{{ asset('js/filter.js') }}"></script>
</x-layout>
