<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="paterno" value="{{ __('AP Paterno') }}" />
                <x-input id="paterno" class="block mt-1 w-full" type="text" name="paterno" required autocomplete="new-paterno" />
            </div>

            <div class="mt-4">
                <x-label for="materno" value="{{ __('AP Materno') }}" />
                <x-input id="materno" class="block mt-1 w-full" type="text" name="materno" required autocomplete="new-materno" />
            </div>

            <div class="mt-4">
                <x-label for="dni" value="{{ __('DNI') }}" />
                <x-input id="dni" class="block mt-1 w-full" type="text" name="dni" required autocomplete="new-dni" />
            </div>

            <div class="mt-4">
                <x-label for="estado_civil" value="{{ __('Estado Civil') }}" />
                <x-input id="estado_civil" class="block mt-1 w-full" type="text" name="estado_civil" required autocomplete="new-estado_civil" />
            </div>

            <div class="mt-4">
                <x-label for="fecha_nacimiento" value="{{ __('Fecha Nacimiento') }}" />
                <x-input id="fecha_nacimiento" class="block mt-1 w-full" type="text" name="fecha_nacimiento" required autocomplete="new-fecha_nacimiento" />
            </div>

            <div class="mt-4">
                <x-label for="sexo" value="{{ __('Sexo-Genero') }}" />
                <x-input id="sexo" class="block mt-1 w-full" type="text" name="sexo" required autocomplete="new-sexo" />
            </div>

            <div class="mt-4">
                <x-label for="rol" value="{{ __('Rol') }}" />
                <x-input id="rol" class="block mt-1 w-full" type="text" name="rol" required autocomplete="new-rol" />
            </div>

            <div class="mt-4">
                <x-label for="celular" value="{{ __('Celular') }}" />
                <x-input id="celular" class="block mt-1 w-full" type="text" name="celular" required autocomplete="new-celular" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
