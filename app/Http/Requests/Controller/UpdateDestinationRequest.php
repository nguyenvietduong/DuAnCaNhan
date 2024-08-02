<?php

namespace App\Http\Requests\Tour;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDestinationRequest extends FormRequest
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
            'name' => 'required|unique:destination,name, ' . $this->id . '',
            'province_id' => 'required',
            'district_id' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập vào ô tiêu đề.',
            'name.unique' => 'Tên địa danh đã tồn tại. Vui lòng chọn tên khác.',
            'province_id.required' => 'Bạn chưa chọn thành phố',
            'district_id.unique' => 'Bạn chưa chọn quận/huyện',
        ];
    }
}
