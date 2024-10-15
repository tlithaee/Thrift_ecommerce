<div class="relative flex flex-col overflow-hidden rounded-lg border group w-70 h-40">
    <div class="aspect-square overflow-hidden">
        <img class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110" src="{{ $image }}" alt="{{ $category }}" />
        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <h3 class="text-white text-lg font-regular">See All</h3> 
        </div>
    </div>
    <div class="my-2 mx-auto flex justify-center">
        <h3 class="text-m font-regular">{{ $category }}</h3> 
    </div>
</div>
