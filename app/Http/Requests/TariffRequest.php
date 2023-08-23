<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TariffRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $required = $isUpdate ? '' : 'required|';
        $unique = $required === ''? '' :   Rule::unique('tariffs')->where(function ($query) {
            return $query->where('operator_id_from', $this->operator_id_from)
                ->where('operator_id_to', $this->operator_id_to);
        });
        return [
            'operator_id_from' => $required.'integer',
            'operator_id_to' => [
                $required.
                'integer',
                 $unique
            ],            'cost' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'operator_id_from.required' => 'Поле "Оператор От" обязательно для заполнения.',
            'operator_id_from.integer' => 'Поле "Оператор От" должно быть числом.',
            'operator_id_to.required' => 'Поле "Оператор К" обязательно для заполнения.',
            'operator_id_to.integer' => 'Поле "Оператор К" должно быть числом.',
            'operator_id_to.unique' => 'Тариф с выбранными операторами уже существует.',
            'cost.required' => 'Поле "Стоимость" обязательно для заполнения.',
            'cost.integer' => 'Поле "Стоимость" должно быть числом.',
            'cost.min' => 'Значение поля "Стоимость" должно быть больше :min.',
        ];
    }
}
