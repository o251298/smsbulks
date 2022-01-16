<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMessageRequest extends FormRequest
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
        $rules = [
            'originator' => 'required',
            'text' => 'required|min:1|max:268',
        ];
        if ($this->route()->named('send.single.send')){
            $rules['phone'] = 'required|integer';
        }
        if ($this->route()->named('send.bulk.send')){
            $rules['group'] = 'required';
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'originator.required' => 'Альфа имя обязательно к заполнению',
            'text.required' => 'Поле "Текст" обязательно к заполнению',
            'text.max' => 'Поле "Текст" должно помещать не больше 268 символов',
            'phone.integer' => 'Поле "Телефон" должно местить только цифры',
            'phone.required' => 'Поле "Телефон" обязательно к заполнению',
            'group.required' => 'Поле "База номеров" обязательно к заполнению',
        ];
    }
}
