<?php

namespace Modules\Divorce\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReturnDivorceFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|integer',
            'last_name' => 'required|string',
            'status' => 'required|integer',
            'date' => 'required',
        ];
    }

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
