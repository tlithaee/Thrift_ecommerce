<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-500 text-sm text-white rounded-lg font-medium transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
