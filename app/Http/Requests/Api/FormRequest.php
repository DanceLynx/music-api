<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest as HttpFormRequest;

class FormRequest extends HttpFormRequest
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

}
