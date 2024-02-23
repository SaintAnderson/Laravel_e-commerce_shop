<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
{
    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения.',
            'exists' => 'Выбранное значение для :attribute недопустимо.',
            'integer' => 'Поле :attribute должно быть целым числом.',
            'min' => [
                'numeric' => 'Поле :attribute должно быть не менее :min.',
                'string' => 'Поле :attribute должно содержать не менее :min символов.',
            ],
            'max' => [
                'numeric' => 'Поле :attribute не может быть больше :max.',
                'string' => 'Поле :attribute не может содержать более :max символов.',
            ],
            'string' => 'Поле :attribute должно быть строкой.',
        ];
    }

    /**
     * @return array<string
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ];
    }
}
