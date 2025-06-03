@props(['active' => false])

<a class="{{ $active ? 'bg-orange-700 text-white' : "text-white hover:bg-orange-700 hover:text-white"}} rounded-md px-3 py-2 text-sm font-medium" 
aria-current="{{ $active ? 'page' : false }}" {{ $attributes }}> {{ $slot }}</a>