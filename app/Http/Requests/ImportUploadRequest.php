<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportUploadRequest extends FormRequest
{

    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }


    public function rules()
    {
        return [
            'file' => 'required'
        ];
    }


    public function attributes()
    {
        return [
            //
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
