<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-orange-600 hover:bg-orange-500 text-sm text-white rounded-lg font-medium transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
