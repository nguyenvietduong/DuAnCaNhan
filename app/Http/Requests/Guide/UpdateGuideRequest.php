<?php

namespace App\Http\Requests\Guide;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGuideRequest extends FormRequest
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
            'name'      => 'required',
            'email'     => 'required|email',
            'phone'     => 'required',
            'password'  => 'required',
            'birthday'  => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'Bạn chưa nhập vào tên hdv.',
            'email.required'    => 'Bạn chưa nhập vào ô email.',
            'phone.required'    => 'Bạn chưa nhập vào ô phone.',
            'password.required' => 'Bạn chưa nhập vào ô password.',
            'birthday.required' => 'Bạn chưa nhập vào ô birthday.',
        ];
    }
}
