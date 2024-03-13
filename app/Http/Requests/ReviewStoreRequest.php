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
            'required' => 'Поле "Отзыв" обязательно для заполнения.',
            'exists' => 'Выбранное значение для :attribute недопустимо.',
            'integer' => 'Поле "Рейтинг" должно быть целым числом.',
            'min' => [
                'numeric' => 'Поле "Рейтинг" обязательно для заполнения.',
                'string' => 'Поле "Рейтинг" обязательно для заполнения.',
            ],
            'max' => [
                'numeric' => 'Поле "Рейтинг" не может быть больше :max.',
                'string' => 'Поле "Рейтинг" не может содержать более :max символов.',
            ],
            'string' => 'Поле "Отзыв" должно быть строкой.',
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
