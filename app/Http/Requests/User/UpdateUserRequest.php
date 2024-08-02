<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email'         => 'required|email',
            'name'          => 'required|unique:users,name, ' . $this->id . '',
            'phone'         => 'required|max:10',
            'publish'       => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'                => 'Bạn chưa nhập vào ô email.',
            'email.email'                   => 'Vui lòng nhập đúng định dạng email.',

            'name.required'                 => 'Bạn chưa nhập vào ô họ tên.',
            'name.string'                   => 'Họ tên phải là 1 chuỗi kí tự.',
            'name.regex'                    => 'Họ tên chỉ được nhập kí tự chữ cái.',

            'phone.required'                => 'Bạn chưa nhập vào ô số điện thoại.',
            'phone.max'                     => 'Số điện thoại phải tối đa 10 số.',

            'publish.required'              => 'Bạn chưa chọn tình trạng.',
        ];
    }
}