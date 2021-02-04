<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
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
            'loan_name' => 'required|string', 
            'amount' => 'required|string',
            'due_date' => 'required|date', 
            'car_year' => 'required|string', 
            'car_make' => 'required|string', 
            'car_model' => 'required|string', 
            'car_body_style' => 'required|string', 
        ];
    }

    public function messages()
    {
        return [
            'loan_name.required' => 'A loan is required', 
        ];
    }
}
