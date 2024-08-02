<?php

namespace App\Http\Requests\Guide;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuideRequest extends FormRequest
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
            'name'        => 'required',
            'email'       => 'required|email',
            'phone'       => 'required',
            'password'    => 'required|string|min:6|max:10',
            're_password' => 'required||string|min:6|same:password',
            'birthday'    => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => 'Bạn chưa nhập vào tên hdv.',
            'email.required'       => 'Bạn chưa nhập vào ô email.',
            'phone.required'       => 'Bạn chưa nhập vào ô phone.',
            'password.required'    => 'Bạn chưa nhập vào ô mật khẩu.',
            'password.min'         => 'Mật khẩu phải tối thiểu 6 kí tự.',
            'password.max'         => 'Mật khẩu phải tối thiểu 10 kí tự.',
            're_password.required' => 'Bạn chưa nhập vào ô nhập lại mật khẩu.',
            're_password.same'     => 'Mật khẩu và xác nhận mật khẩu không khớp.',
            'birthday.required'    => 'Bạn chưa nhập vào ô birthday.',

        ];
    }
}
