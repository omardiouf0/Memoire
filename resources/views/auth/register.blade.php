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
                <x-label for="role" value="Rôle" />
                <select id="role" name="role" required class="block mt-1 w-full">
                    <option value="">-- Sélectionnez le rôle --</option>
                    <option value="etudiant" {{ old('role') == 'etudiant' ? 'selected' : '' }}>Étudiant</option>
                    <option value="professeur" {{ old('role') == 'professeur' ? 'selected' : '' }}>Professeur</option>
                </select>
            </div>

            <div id="etudiant-fields" style="display: none;">
                <!-- Matricule -->
                <div class="mt-4">
                    <x-label for="matricule" value="Matricule" />
                    <x-input id="matricule" class="block mt-1 w-full" type="text" name="matricule" :value="old('matricule')" />

                </div>

                <!-- Niveau -->
                  
                <div class="mt-4">
                    <x-label for="niveau" value="Niveau" />
                    <select id="niveau" name="niveau" required class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">-- Sélectionnez un niveau --</option>
                        <option value="BTS1" {{ old('niveau') == 'BTS1' ? 'selected' : '' }}>BTS1</option>
                        <option value="BTS2" {{ old('niveau') == 'BTS2' ? 'selected' : '' }}>BTS2</option>
                    </select>
                    @error('niveau')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Filière (groupée par département) -->
                <div class="mt-4">
                    <x-label for="filiere_id" value="Filière" />
                    <select id="filiere_id" name="filiere_id" required class="block mt-1 w-full">
                        <option value="">-- Sélectionnez une filière --</option>
                        @foreach ($departements as $departement)
                            <optgroup label="{{ $departement->name }}">
                                @foreach ($departement->filieres as $filiere)
                                    <option value="{{ $filiere->id }}" {{ old('filiere_id') == $filiere->id ? 'selected' : '' }}>
                                        {{ $filiere->name }}
                                    </option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>

            </div>  

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
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

                <x-button class="ms-4 bg-[#3639f7]">
                    {{ __('Register') }}
                </x-button>
            </div>
               
        </form>

        <script>
        const roleSelect = document.getElementById('role');
        const etudiantFields = document.getElementById('etudiant-fields');

        roleSelect.addEventListener('change', function () {
            const isEtudiant = this.value === 'etudiant';

            etudiantFields.style.display = isEtudiant ? 'block' : 'none';

            // Désactiver tous les champs internes si ce n’est pas un étudiant
            const inputs = etudiantFields.querySelectorAll('input, select');
            inputs.forEach(input => {
                input.disabled = !isEtudiant;
            });
        });

        // Déclencher une fois au chargement pour bien gérer les valeurs pré-remplies
        window.addEventListener('DOMContentLoaded', () => {
            roleSelect.dispatchEvent(new Event('change'));
        });
    </script>

    </x-authentication-card>
</x-guest-layout>
