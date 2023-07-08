<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'paterno' => ['required', 'string', 'max:50'],
            'materno' => ['required', 'string', 'max:50'],
            'dni' => ['required', 'string', 'max:15'],
            'estado_civil' => ['required', 'string', 'max:50'],
            'fecha_nacimiento' => ['required', 'string', 'max:50'],
            'sexo' => ['required', 'string', 'max:15'],
            'rol' => ['required', 'string', 'max:50'],
            'celular' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            // Aquí puedes implementar la lógica para actualizar la foto de perfil
            //$user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
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
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
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
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
