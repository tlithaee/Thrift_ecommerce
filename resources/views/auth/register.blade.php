<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="w-full">
        @csrf

        <div class="mb-4 text-start">
            <h2 class="text-2xl font-semibold text-gray-800 mt-2">Register</h2>
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

         <!-- Password -->
         <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full pr-10" type="password" name="password" required autocomplete="new-password" />
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                    <svg id="toggle-password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path id="eye-icon-password" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm9-3a11.5 11.5 0 00-20 0m20 0a11.5 11.5 0 01-20 0"/>
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <div class="relative">
                <x-text-input id="password_confirmation" class="block mt-1 w-full pr-10" type="password" name="password_confirmation" required autocomplete="new-password" />
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                    <svg id="toggle-password-confirmation" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path id="eye-icon-password-confirmation" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm9-3a11.5 11.5 0 00-20 0m20 0a11.5 11.5 0 01-20 0"/>
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mb-6">
            <x-primary-button class="w-full justify-center py-2 px-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <!-- Additional Link -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">
                {{ __('Already have an account?') }}
                <a href="{{ route('login') }}" class="underline text-green-600 hover:text-green-500">
                    {{ __('Login here') }}
                </a>
            </p>
        </div>
    </form>

    <script>
        function togglePasswordVisibility(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.setAttribute('d', 'M15 12a3 3 0 11-6 0 3 3 0 016 0zm9-3a11.5 11.5 0 00-20 0m12 0l-4 4m0-4l4 4');
            } else {
                input.type = 'password';
                icon.setAttribute('d', 'M15 12a3 3 0 11-6 0 3 3 0 016 0zm9-3a11.5 11.5 0 00-20 0m20 0a11.5 11.5 0 01-20 0');
            }
        }

        document.getElementById('toggle-password').addEventListener('click', () => togglePasswordVisibility('password', 'eye-icon-password'));
        document.getElementById('toggle-password-confirmation').addEventListener('click', () => togglePasswordVisibility('password_confirmation', 'eye-icon-password-confirmation'));
    </script>
</x-guest-layout>
