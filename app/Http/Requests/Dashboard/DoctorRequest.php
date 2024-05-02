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
            'appointments' => 'required',
            'section_id'=> 'required|exists:sections,id',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required'=>'الاسم مطلوب',
            'name.min'=>'يجب ان يكون الأسم أكثر من 10 أحرف',
            'name.max'=>'يجب ان يكون الأسم أقل من 100 أحرف',
            ########################################################
            'email.required'=>'البريد الالكترونى مطلوب',
            'email.email'=>'برجاء كتابة البريد الالكترونى بطريقه صحيحه',
            'email.min'=>'برجاء كتابة البريد الالكترونى بطريقه صحيحه',
            'email.unique'=>'البريد الالكترونى موجود بالفعل',
            ########################################################
            'password.required'=>'كلمة المرور مطلوب',
            'password.min'=>'يجب ان يكون كلمة المرور أكثر من 6 أحرف',
            'password.max'=>'يجب ان يكون كلمة المرور أقل من 255 أحرف',
            ########################################################
            'phone.required'=>'الموبايل مطلوب',
            'phone.min'=>'يجب ان يكون كلمة المرور أكثر من 3 أحرف',
            'phone.max'=>'برجاء كتابة الموبايل بطريقة صحيحه',
            ########################################################
            'section_id.exists' => 'القسم المحدد غير موجود.',
            ########################################################
            'appointments.required'=>'المواعيد مطلوبة',
            ########################################################
        ];
    }

    public function attributes(): array
    {
        return [
//            'section_id' => 'القسم'
        ];
    }
}
