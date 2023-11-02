<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlateRequest extends FormRequest
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
            "plate_name"=>"required|string|max:100",
            "ingredients"=>"required|string",
            "plate_image"=>"nullable|image",
            "description"=>"required|string",
            "price"=>"required|decimal:0,2",
            "visibility"=>"required|boolean",
        ];
    }
}
