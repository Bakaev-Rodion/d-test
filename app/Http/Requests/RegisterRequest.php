<?php

namespace App\Http\Requests;

use App\Models\Role;
use App\Models\Team;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        if($this->role_id == Role::ROLE_ADMIN)
            $this->merge(['team_id'=>Team::where('name','Admin team')->value('id')]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|unique|min:3',
            'email' => "required|email|unique:users,email",
            'password' => "required|min:4|max:20",
            'role_id' => 'required',
        ];
        switch($this->role_id) {
            case Role::ROLE_TEAMLEAD:
                return array_merge($rules, ['team_name' => 'required|unique']);
            case Role::ROLE_BUYER || Role::ROLE_ADMIN:
                 return array_merge($rules, ['team_id' => 'required']);
            default:
                return $rules;
        }
    }
}
