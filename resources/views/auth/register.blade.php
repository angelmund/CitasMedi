<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}">
<x-guest-layout>
    <x-register-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h2 class="text-center text-lg font-semibold mb-4">Datos de usuario</h2>
                    <div class="mb-4">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mb-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>

                    <div class="mb-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mb-4">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                </div>

                <div>
                    <h2 class="text-center text-lg font-semibold mb-4">Datos de Alumno</h2>
                    <div class="mb-4">
                        <x-label for="clave" value="{{ __('Clave') }}" />
                        <x-input id="clave" class="block mt-1 w-full" type="text" name="clave" :value="old('clave')" required autofocus autocomplete="clave" />
                    </div>

                    <div class="mb-4">
                        <x-label for="primer_apellido" value="{{ __('Apellido Paterno') }}" />
                        <x-input id="primer_apellido" class="block mt-1 w-full" type="text" name="primer_apellido" :value="old('primer_apellido')" required autofocus autocomplete="primer_apellido" />
                    </div>

                    <div class="mb-4">
                        <x-label for="segundo_apellido" value="{{ __('Apellido Materno') }}" />
                        <x-input id="segundo_apellido" class="block mt-1 w-full" type="text" name="segundo_apellido" :value="old('segundo_apellido')" required autofocus autocomplete="segundo_apellido" />
                    </div>

                    <div class="mb-4">
                        <x-label for="carreramodalidad_id" value="{{ __('Modalidad - Carrera') }}" />
                        <select id="carreramodalidad_id" name="carreramodalidad_id" class="select2 py-2 px-3 w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" required>
                            <option value="">{{ __('selecciona tu Carrera') }}</option>
                            @foreach ($carrearModalidad as $modalidad)
                                <option value="{{ $modalidad->id }}">{{ $modalidad->modalidade->nombre_modalidad }} {{$modalidad->nombre_carrera}} - {{ $modalidad->niveles_academico->nombre_nivel }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <x-label for="semestre_id" value="{{ __('Semestre') }}" />
                        <select id="semestre_id" name="semestre_id" class="select2 py-2 px-3 w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" required>
                            <option value="">{{ __('selecciona tu semestre') }}</option>
                            @foreach ($semestres as $semestre)
                                <option value="{{ $semestre->id }}">{{ $semestre->nombre_semestre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-center mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-register-card>
</x-guest-layout>

<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/select2/select2.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function aplicarSelect2(elementId) {
            var element = $(elementId);
            element.each(function () {
                var $this = $(this);
                $this.wrap('<div class="relative"></div>');
                $this.select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    placeholder: 'Seleccione una opción',
                    dropdownParent: $this.parent()
                });
            });
        }
        aplicarSelect2('.select2');
    });
</script>
