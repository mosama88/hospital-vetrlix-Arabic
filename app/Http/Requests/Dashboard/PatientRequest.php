<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
//            'nation_number' => 'required|numeric',
            'nation_number' => 'required|unique:patients,nation_number|min:14|max:14',
            'name'=>"required|string|min:3|max:100",
            'email'=>"required|unique:patients,email|email|min:3",
            'password'=>"required|min:6|max:50",
            'phone'=>"required|string|min:5|max:20",
            'birth_date'=>"required|date|before_or_equal:today",
            'type_blood'=>"required",
            'gender'=>"required|in:male,female",
            'sick_history'=>"nullable|string|min:10|max:2500",
            'address_id'=>"required|exists:addresses,id",
        ];
    }

    public function messages(): array
    {
        return [
            'nation_number.required'=>'الرقم القومى مطلوب',
            'nation_number.numeric'=>'برجاء كتابة الرقم القومى بطريقة صحيحة',
            'nation_number.unique'=>'الرقم القومى مسجل بالفعل',
            'nation_number.min'=>'يجب ان يكون الرقم القومى لا يقل عن 14 رقم',
            'nation_number.max'=>'يجب ان يكون الرقم القومى لا يزيد عن 14 رقم',
            ########################################################
            'name.required'=>'الاسم مطلوب',
            'name.min'=>'يجب ان يكون الأسم أكثر من 3 أحرف',
            'name.max'=>'يجب ان يكون الأسم أقل من 100 حرف',
            ########################################################
            'email.required'=>'البريد الالكترونى مطلوب',
            'email.unique'=>'البريد الالكترونى مسجل بالفعل',
            'email.email'=>'برجاء كتابة البريد الالكترونى بطريقه صحيحه',
            'email.min'=>'برجاء كتابة البريد الالكترونى بطريقه صحيحه',
            ########################################################
            'password.required'=>'كلمة المرور مطلوب',
            'password.min'=>'يجب ان يكون كلمة المرور أكثر من 6 أحرف',
            'password.max'=>'يجب ان يكون كلمة المرور أقل من 50 أحرف',
            ########################################################
            'phone.required'=>'الموبايل مطلوب',
            'phone.min'=>'يجب ان يكون كلمة المرور أكثر من 5 أحرف',
            'phone.max'=>'برجاء كتابة الموبايل بطريقة صحيحه',
            ########################################################
            'address_id.exists' => 'العنوان المحدد غير موجود.',
            ########################################################
            'sick_history.min' => 'يجب ان يكون كتابة التاريخ المرضى بالتفصيل',
            'sick_history.max' => 'يجب ان يكون التاريخ المرضى أقل من 2500 حرف ',
            ########################################################
            'gender.required'=>"برجاء الأختيار ما بين ذكر و أنثى",
            'gender.in'=>'الجنس المحدد غير موجود.',
            #######################################################
            'type_blood.required'=>"برجاء أختيار فصيلة الدم",
            #######################################################
            'birth_date.required'=>"برجاء أختيار تاريخ الميلاد",
            'birth_date.before_or_equal'=>"برجاء أختيار تاريخ الميلاد بطريقة صحيحه",


        ];
    }
}
