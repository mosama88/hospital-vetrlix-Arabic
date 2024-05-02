<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AmbulanceRequest extends FormRequest
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
            'car_number'=>'required|string|min:5|max:10',
            'car_model'=>'required|string|min:3|max:30',
            'car_year_model'=>'required|string|min:3|max:30',
            'phone' => 'required|string|min:3|max:20',
            'license_number'=>'required|string|min:3|max:30',
            'available'=> 'required',
            'type'=> 'required',
            'notes'=> 'nullable|string|min:10|max:2500',
        ];
    }


    public function messages(): array
    {
        return [
            'car_number.required'=>'رقم السياره مطلوب',
            'car_number.min'=>'يجب ان يكون رقم السياره أكثر من 5 أحرف',
            'car_number.max'=>'يجب ان يكون رقم السياره أقل من 10 حرف',
            ########################################################
            'name.required'=>'أسم سائق السياره مطلوب',
            'name.min'=>'يجب ان يكون أسم سائق السياره أكثر من 10 أرقام',
            'name.max'=>'يجب ان يكون أسم سائق السياره أقل من 30 رقم',
            ########################################################
            'car_model.required'=>'موديل السيارة مطلوب',
            'car_model.min'=>'يجب ان يكون موديل السياره أكثر من 10 أحرف',
            'car_model.max'=>'يجب ان يكون موديل السياره أقل من 30 حرف',
            ########################################################
            'car_year_model.required'=>'سنة صنع السيارة مطلوب',
            'car_year_model.min'=>'يجب ان يكون سنة صنع السياره أكثر من 10 أحرف',
            'car_year_model.max'=>'يجب ان يكون سنة صنع السياره أقل من 30 حرف',
            ########################################################
            'phone.required'=>'الموبايل مطلوب',
            'phone.min'=>'يجب ان يكون كلمة المرور أكثر من 3 أحرف',
            'phone.max'=>'برجاء كتابة الموبايل بطريقة صحيحه',
            ########################################################
            'license_number.required' => 'رخصة القيادة مطلوبة',
            'license_number.min'=>'يجب ان يكون رخصة القيادة أكثر من 3 أرقام',
            'license_number.max'=>'يجب ان يكون رخصة القيادة أقل من 30 رقم',
            ########################################################
            'type.required' => 'نوع السيارة مطلوب',
            ########################################################
            'notes.min'=>'يجب ان يكون ملاحظاتك أكثر من 10 أحرف',
            'notes.max'=>'يجب ان يكون ملاحظاتك أقل من 2500 أحرف',
            ########################################################
        ];
    }

}
