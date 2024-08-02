<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class BookingDetailRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'tour_date' => 'required',
            'adult' => 'required',
            'description' => 'max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Bạn chưa nhập vào tên!.',
            'email.required' => 'Bạn chưa nhập vào ô email.',
            'phone.required' => 'Bạn chưa nhập vào số điện thoại.',
            'address.required' => 'Bạn chưa nhập vào địa chỉ.',
            'tour_date.required' => 'Bạn chưa chọn ngày khởi hành.',
            'adult.max' => 'Bạn chưa chọn số người.',
            'description.max' => 'Không được ghi chú quá 255 kí tự.',

        ];
    }
}
