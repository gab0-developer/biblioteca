<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
{

    use PasswordValidationRules;
    
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'password' => ['required','string',$this->passwordRules(),'confirmed'],
            'nombre_usuario' => ['required', 'string', 'min:3'],
            'apellido_usuario' => ['required', 'string', 'min:3'],
            'fecha_nacimiento' => ['required', 'date'],
            'correo_usuario' => ['required','email','unique:users,email', 'min:3'],
            'telefono_usuario' => ['required', 'string', 'unique:bibliotecario,telefono', 'min:3'],
            
        ];
    }
}
