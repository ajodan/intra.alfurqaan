<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YatimduafaRequest extends FormRequest
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
        return [
            'nm_lengkap' => 'required',
            'tgl_lhr' => 'required',
            'hp' => 'required|number',
            'status' => 'required',
            'alamat' => 'required',
        ];
    }
}
