<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'name'=>'required|string|min:3|max:30',
            'email'=>'required|email|min:3|unique:users,email',
            'password'=>'required|string|min:6|max:255',
            'phone'=>'required|string|min:3|max:20',
            'price'=>'required|string|min:2|max:20',
            'appointments' => 'required',
            'section_id'=> 'required|exists:sections,id',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required'=>'خانة الاسم مطلوبه',
            'email.required'=>'خانة البريد الالكترونى مطلوبه',
            'password.required'=>'خانة كلمة المرور مطلوبه',
            'phone.required'=>'خانة الموبايل مطلوبه',
            'section_id.required'=>'خانة القسم مطلوبه',
            'price.required'=>'خانة السعر مطلوبه',
        ];
    }
}
