<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'email|required',
            'body' => ''
            // А почему не проверяем собственно наличие заявки?
            // А потому что клиенты - часто люди занятые и им проще заполнить
            // своё имя и контактную информацию, и подождать, пока тебе перезвонят
            // но поле нам нужно
        ];
    }

    public function messages()
    {
        /*
            Не будем оставлять пользователя с дефолтными сообщениями об ошибках
        */
        return [
            'name.required' => 'Нужно заполнить имя',
            'email.required' => 'Нужно заполнить электронную почту',
            'email.email' => 'Некорректный адрес электронной почты',
        ];
    }
}
