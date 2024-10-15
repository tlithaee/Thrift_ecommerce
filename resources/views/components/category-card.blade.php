<div class="relative flex flex-col overflow-hidden rounded-lg border group w-70 h-40">
    <div class="aspect-square overflow-hidden">
        <a href="/categories/{{ $category->slug }}"> 
            <img class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110" src="{{ $category->category_image }}" alt="{{ $category->category_name }}" />
            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <h3 class="text-white text-lg font-regular">See All</h3> 
            </div>
        </a>
    </div>
    <div class="my-2 mx-auto flex justify-center">
        <h3 class="text-m font-regular">{{ $category->category_name }}</h3> 
    </div>
</div>
