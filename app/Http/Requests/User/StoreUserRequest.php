<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'username' => 'required|string|unique:users',
            'phone' => 'required|max:10',
            'password' => 'required|string|min:6|max:10',
            're_password' => 'required||string|min:6|same:password',
            'publish' => 'required',
        ];
    }

    public function messages(): array
    {
        return [

            'email.required' => 'Bạn chưa nhập vào ô email.',
            'email.email' => 'Vui lòng nhập đúng định dạng email.',
            'email.unique' => 'Email đã tồn tại, vui lòng chọn email khác.',

            'username.required' => 'Bạn chưa nhập vào ô họ tên.',
            'username.unique' => 'Tên đăng nhập đã tồn tại, vui lòng chọn tên đăng nhập khác.',
            'username.string' => 'Họ tên phải là 1 chuỗi kí tự.',

            'phone.required' => 'Bạn chưa nhập vào ô số điện thoại.',
            'phone.max' => 'Số điện thoại phải tối đa 10 số.',

            'password.required' => 'Bạn chưa nhập vào ô mật khẩu.',
            'password.min' => 'Mật khẩu phải tối thiểu 6 kí tự.',
            'password.max' => 'Mật khẩu phải tối thiểu 10 kí tự.',

            're_password.required' => 'Bạn chưa nhập vào ô nhập lại mật khẩu.',
            're_password.same' => 'Mật khẩu và xác nhận mật khẩu không khớp.',

            'publish.required' => 'Bạn chưa chọn tình trạng.',
        ];
    }
}