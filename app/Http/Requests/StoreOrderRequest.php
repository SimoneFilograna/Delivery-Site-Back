<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "cart"=> "required|array",
            "customer_name" => "required|string",
            "customer_lastname" => "required|string", 
            "customer_email" => "required|string",
            "customer_address" => "required|string",
            "customer_phone" => "required|string",
            "amount_paid" => "required|decimal:0,2"
        ];
    }
}
