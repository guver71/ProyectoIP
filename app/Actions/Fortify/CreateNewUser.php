<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     * @return User
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'paterno' => ['required', 'string', 'max:255'],
            'materno' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'string', 'max:15'],
            'estado_civil' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'string', 'max:255'],
            'sexo' => ['required', 'string', 'max:150'],
            'rol' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'paterno' => $input['paterno'],
            'materno' => $input['materno'],
            'dni' => $input['dni'],
            'estado_civil' => $input['estado_civil'],
            'fecha_nacimiento' => $input['fecha_nacimiento'],
            'sexo' => $input['sexo'],
            'rol' => $input['rol'],
            'celular' => $input['celular'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
