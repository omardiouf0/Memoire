<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Filiere;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role' => ['required', 'in:etudiant,professeur'],
            'specialiste'=>['required','in:francais,anglais,electronique,reseau,programmation,entrepreneur,design,electrique'],
            'matricule' => ['nullable', 'string', 'unique:users,matricule', 'regex:/^M\d{7}$/'],
            'niveau' => ['required_if:role,etudiant', 'in:BTS1,BTS2'],
            'filiere_id' => ['nullable', 'exists:filieres,id'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            [
                'matricule.regex' => 'Le matricule doit commencer par "M" suivi de 7 chiffres.',
                'matricule.unique' => 'Ce matricule est déjà utilisé.',
            ]
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => $input['role'],
            'matricule' => $input['role'] === 'etudiant' ? $input['matricule'] : null,
            'niveau' => $input['role'] === 'etudiant' ? $input['niveau'] : null,
            'filiere_id' => $input['role'] === 'etudiant' && isset($input['filiere_id']) ? $input['filiere_id'] : null,
   
        ]);

        if ($input['role'] === 'etudiant' && isset($input['filiere_id'])) {
            $filiere = Filiere::find($input['filiere_id']);
            if ($filiere && $filiere->departement_id) {
                $user->departements()->attach($filiere->departement_id);
            }
        }

        return $user;
    }
}
