<?php

namespace App\Http\Requests\Controller;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'slug' => 'required|unique:categories,slug, ' . $this->id . '',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập vào ô tiêu đề.',
            'slug.required' => 'Bạn chưa nhập vào ô đường dẫn',
            'slug.unique' => 'Đường dẫn đã tồn tại, Hãy chọn đường dẫn khác',
        ];
    }
}
