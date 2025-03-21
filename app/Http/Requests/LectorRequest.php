<?php

namespace App\Http\Requests;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;

use function Laravel\Prompts\password;

class LectorRequest extends FormRequest
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
            'nombre_lector' => ['required', 'string', 'min:3'],
            'apellido_lector' => ['required', 'string', 'min:3'],
            'fecha_nacimiento' => ['required', 'date'],
            'correo_lector' => ['required','email','unique:users,email', 'min:3'],
            'telefono_lector' => ['required', 'string', 'unique:lector,telefono', 'min:3'],
            
        ];
    }
}
