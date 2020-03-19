<?php

namespace App\Http\Requests\Forms;

use App\Http\Requests\Request;
use App\Rules\Tariffs;

/**
 * Class OrderTariffRequest
 * @package App\Http\Requests\Forms
 */
class OrderTariffRequest extends Request
{
    public function rules(): array
    {
        return [
            'tariff' => ['required', 'string', new Tariffs],
            'name' => 'required|string|min:3|max:40|not_regex:/[^а-яА-ЯёЁ\s]/i',
            'phone' => 'required|string|min:5',
            'email' => 'required|email'
        ];
    }
}
