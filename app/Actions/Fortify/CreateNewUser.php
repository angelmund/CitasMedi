<?php

namespace App\Actions\Fortify;

use App\Models\Paciente;
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
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Crear el usuario
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // Crear el paciente
        $paciente = new Paciente();
        $paciente->nombre = $input['name'];
        $paciente->apellido_paterno = $input['apellido_paterno'];
        $paciente->apellido_materno = $input['apellido_materno'];
        $paciente->telefono = $input['telefono'];
        $paciente->id_usuario = $user->id; // Asignar el ID del usuario creado
        $paciente->save();

        return $user;
    }
}
