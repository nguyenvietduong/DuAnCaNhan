<?php

namespace App\Http\Requests\Tour;

use Illuminate\Foundation\Http\FormRequest;

class StoreTourRequest extends FormRequest
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
            'name' => 'required',
            'slug' => 'required|unique:tours',
            'description' => 'required',
            'code' => 'required',
            'price' => 'required',
            'image' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập vào ô tiêu đề.',
            'slug.required' => 'Bạn chưa nhập vào ô đường dẫn',
            'slug.unique' => 'Đường dẫn đã tồn tại, Hãy chọn đường dẫn khác',
            'description.required' => 'Bạn chưa thêm mô tả',
            'code.required' => 'Bạn chưa nhập vào mã tour',
            'price.required' => 'Bạn chưa nhập vào giá tiền',
            'image.required' => 'Bạn chưa thêm ảnh đại diện',
        ];
    }
}
