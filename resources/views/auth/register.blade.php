<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Naam')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Wachtwoord')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Verifieer wachtwoord')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
                <div id="app">
                    <chamber-of-commerce-input-field></chamber-of-commerce-input-field>
                </div>

                <!-- Company domain -->
            <div class="mt-4">
                <x-label for="company_domain" :value="__('CCV webshop URL')" />

                <x-input id="company_domain" class="block mt-1 w-full"
                         placeholder="https://bedrijfsnaam.ccvshop.nl/ e.g."
                                type="url" :value="old('company_domain')"
                         name="company_domain" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Heeft u al een account?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registreer') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
