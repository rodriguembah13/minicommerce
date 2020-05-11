<?php

namespace App\Shop\Packs\Requests;

use App\Shop\Base\BaseFormRequest;

class CreatePackRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:brands']
        ];
    }
}
