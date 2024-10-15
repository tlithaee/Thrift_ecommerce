<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4 text-start">
            <h2 class="text-2xl font-semibold text-gray-800 mt-2">Login</h2>
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full pr-10" type="password" name="password" required autocomplete="current-password" />
                <!-- Eye Icon for toggling password visibility -->
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                    <svg id="toggle-password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path id="eye-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm9-3a11.5 11.5 0 00-20 0m20 0a11.5 11.5 0 01-20 0"/>
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me and Forgot Password in One Row -->
        <div class="flex items-center justify-between mt-4">
            <div class="block">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="px-40">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Additional Link -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">
                {{ __("Don't have an account?") }}
                <a href="{{ route('register') }}" class="underline text-green-600 hover:text-green-500">
                    {{ __('Register here') }}
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>

<script>
    const togglePassword = document.getElementById('toggle-password');
    const passwordField = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');

    togglePassword.addEventListener('click', function () {
        // Toggle the type of the password field
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        
        // Toggle the eye icon
        if (type === 'password') {
            eyeIcon.setAttribute('d', 'M15 12a3 3 0 11-6 0 3 3 0 016 0zm9-3a11.5 11.5 0 00-20 0m20 0a11.5 11.5 0 01-20 0');
        } else {
            eyeIcon.setAttribute('d', 'M15 12a3 3 0 11-6 0 3 3 0 016 0zm9-3a11.5 11.5 0 00-20 0m12 0l-4 4m0-4l4 4');
        }
    });
</script>