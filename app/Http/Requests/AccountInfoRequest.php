<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Restrict the fields that the user can change.
     *
     * @return array
     */
    public function validationData()
    {
        return $this->only(backpack_authentication_column(), 'first_name', 'last_name', 'middle_name');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = backpack_auth()->user();

        return [
            backpack_authentication_column() => [
                'required',
                backpack_authentication_column() == 'email' ? 'email' : '',
                Rule::unique($user->getConnectionName().'.'.$user->getTable())
                    ->ignore($user->getKey(), $user->getKeyName()),
            ],
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['max:255'],
        ];
    }
}
