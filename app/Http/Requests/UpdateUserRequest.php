<?php

namespace App\Http\Requests;

//use App\Http\Requests\Request;
//se extiende de FormRequest de Dingo para tener la misma funcionalidad que nos da laravel
use Dingo\Api\Http\FormRequest as Request;

class UpdateUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:255'
        ];
    }
}
