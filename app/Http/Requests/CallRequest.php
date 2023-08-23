<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CallRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'call_from' => 'required|different:call_to',
            'call_to' => 'required|different:call_from',
            'duration'=>'required|integer|min:1',
            'cost'=>'integer|min:1',
            'from_operator'=>'required|integer|min:1',
            'to_operator'=>'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'call_from.required' => 'Поле "Кто звонил" обязательно для заполнения.',
            'call_from.different' => 'Поле "Кто звонил" и поле "Кому звонили" должны быть разными.',
            'call_to.required' => 'Поле "Кому звонили" обязательно для заполнения.',
            'duration.required' => 'Поле "Продолжительность" обязательно для заполнения.',
            'duration.integer' => 'Поле "Продолжительность" должно быть целым числом.',
            'duration.min' => 'Поле "Продолжительность" должно быть больше 0.',
            'cost.required' => 'Поле "Стоимость" обязательно для заполнения.',
            'cost.integer' => 'Поле "Стоимость" должно быть целым числом.',
            'cost.min' => 'Поле "Стоимость" должно быть больше 0.',
            'from_operator.required' => 'Поле "От оператора" обязательно для заполнения.',
            'from_operator.integer' => 'Поле "От оператора" должно быть целым числом.',
            'from_operator.min' => 'Поле "От оператора" должно быть больше 0.',
            'to_operator.required' => 'Поле "К оператору" обязательно для заполнения.',
            'to_operator.integer' => 'Поле "К оператору" должно быть целым числом.',
            'to_operator.min' => 'Поле "К оператору" должно быть больше 0.',
        ];
    }
}
