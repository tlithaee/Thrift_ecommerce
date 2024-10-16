<nav class="bg-green-700 fixed top-0 left-0 w-full z-50" x-data="{ isOpen: false }">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <!-- Logo dan Link Navigasi -->
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <img src="{{ asset('images/nav_logo.png') }}" class="object-contain h-12 w-12" />
        </div>

        <!-- Links for Desktop -->
        <div class="hidden md:block">
          <div class="ml-10 flex items-baseline space-x-4">
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/menus" :active="request()->is('menus')">Menu</x-nav-link>
            <x-nav-link href="/order" :active="request()->is('order')">Order</x-nav-link>
            <x-nav-link href="/chefs" :active="request()->is('chefs')">Chefs</x-nav-link>
          </div>
        </div>
      </div>

      <!-- Tombol Hamburger untuk Mobile -->
      <div class="md:hidden">
        <button @click="isOpen = !isOpen" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-300 hover:bg-green-800 focus:outline-none focus:bg-green-600 focus:text-white">
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path :class="{'hidden': isOpen, 'inline-flex': !isOpen}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': !isOpen, 'inline-flex': isOpen}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Profile Dropdown -->
      <div class="hidden md:block ml-4 items-center md:ml-6">
        @guest
        <a href="/login" class="text-white text-sm px-4 py-2">Login</a>
        <a href="/register" class="bg-green-600 hover:bg-green-500 text-white text-sm py-2 px-4 rounded-lg">Register</a>
        @endguest

        @auth
        <div class="hidden md:flex md:flex-row md:items-center">
          <span class="text-white text-sm">{{ auth()->user()->name }}</span>
          <div class="relative ml-3" x-data="{ open: false }">
            <button @click="open = !open" @click.outside="open = false" type="button" class="relative flex max-w-xs items-center rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-900" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">Open user menu</span>
              <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('images/user.png') }}" alt="Profile Photo">
            </button>
            <div x-show="open" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-green-900 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700">Your Profile</a>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700">Settings</a>
              <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
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

  <!-- Mobile Menu -->
  <div x-show="isOpen" class="md:hidden">
    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
      <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
      <x-nav-link href="/menus" :active="request()->is('menus')">Menu</x-nav-link>
      <x-nav-link href="/order" :active="request()->is('order')">Order</x-nav-link>
      <x-nav-link href="/chefs" :active="request()->is('chefs')">Chefs</x-nav-link>
    </div>

    @auth
    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
      <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-white">Your Profile</a>
      <a href="#" class="block px-4 py-2 text-white">Settings</a>
      <a href="{{ route('logout') }}" class="block px-4 py-2 text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
    </div>
    @endauth
  </div>
</nav>