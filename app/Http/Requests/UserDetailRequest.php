<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDetailRequest extends FormRequest
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
            'phone' => 'required|string|min:11|max:13', 
            'date_of_birth' => 'required|date',
            'bank_name' => 'required', 
            'bank_acct_name' => 'required', 
            'bank_acct_num' => 'required|integer', 
            'bvn_number' => 'required|integer', 
        ];
    }
}
