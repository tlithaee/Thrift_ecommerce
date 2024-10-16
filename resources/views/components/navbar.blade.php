<!-- Shopping Cart Button -->
<a href="/order">
  <button type="button" class="relative rounded-full p-1 mt-2 text-white hover:text-gray-400 focus:outline-none">
    <span class="absolute -inset-1.5"></span>
    <span class="sr-only">Shopping cart</span>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap" />
    <span class="material-symbols-outlined">shopping_cart</span>
  </button>
</a>

<nav class="bg-green-700 fixed top-0 left-0 w-full z-50" x-data="{ isOpen: false }">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <!-- Logo and Links -->
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img src="{{ asset('images/nav_logo.png') }}" class="object-contain h-12 w-12" />
          </div>
        </div>

        <!-- Links for Desktop -->
        <div class="hidden md:block">
          <div class="lg:ml-10 flex items-baseline lg:space-x-4">
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/menus" :active="request()->is('menu')">Menu</x-nav-link>
            <x-nav-link href="/chefs" :active="request()->is('chefs')">Chefs</x-nav-link>
          </div>
        </div>
      </div>

      <!-- Profile Dropdown and Shopping Cart -->
      <div class="hidden md:flex md:items-center ml-4 items-center md:ml-6 space-x-4">
        @guest
        <a href="/login" class="text-white text-sm px-4 py-2">Login</a>
        <a href="/register" class="bg-green-600 hover:bg-green-500 text-white text-sm py-2 px-4 rounded-lg">Register</a>
        @endguest

        @auth
        <div class="flex items-center space-x-3">
          <!-- Shopping Cart Icon -->
          <a href="/order">
            <button type="button" class="relative rounded-full p-1 text-white hover:text-gray-400 focus:outline-none">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">Shopping cart</span>
              <span class="material-symbols-outlined">shopping_cart</span>
            </button>
          </a>

          <!-- Username and Profile Dropdown -->
          <span class="hidden md:block text-white text-sm">{{ auth()->user()->name }}</span>
          <div class="relative" x-data="{ openProfile: false }">
            <button @click="openProfile = !openProfile" @click.outside="openProfile = false" type="button"
              class="relative flex max-w-xs items-center rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-900"
              id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">Open user menu</span>
              <img class="h-8 w-8 rounded-full"
                src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('images/user.png') }}"
                alt="Profile Photo">
            </button>
            <!-- Dropdown Content -->
            <div x-show="openProfile"
              class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-green-900 focus:outline-none"
              role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700">Your Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700">Settings</a>
              <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </div>
        </div>
        @endauth
      </div>
    </div>
  </div>
</nav>
