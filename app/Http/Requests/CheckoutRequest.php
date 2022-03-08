<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|max:255',
            'address' => 'required',
            'trancation_total' => 'required|integer',
            'trancation_status' => 'nullable|string|in:PENDING,SUCCESS,FAILED',
            'transaction_detail' => 'required|array',
            'transaction_detail.*' => 'integer|exists:products,id'
        ];
    }
}
