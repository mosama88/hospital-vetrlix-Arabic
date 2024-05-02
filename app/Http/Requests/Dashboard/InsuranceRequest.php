<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceRequest extends FormRequest
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
'name'=> 'required|string|min:10|max:100',
//'insurance_code' => 'required|string|regex:/^\d+(\.\d+)?%?$/',
'discount_percentage'=> 'required|string|regex:/^\d+(\.\d+)?%?$/',
'company_rate'=> 'required|string|regex:/^\d+(\.\d+)?%?$/',
'notes'=> 'nullable|string|min:10|max:2500',
'status'=> 'nullable',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required'=>'أسم الشركة مطلوب',
            'name.min'=>'يجب ان يكون أسم الشركه أكثر من 10 أحرف',
            'name.max'=>'يجب ان يكون أسم الشركه أقل من 100 أحرف',
            #######################################################################
//            'insurance_code.required'=>'كود الشركه مطلوب',
            #######################################################################
            'discount_percentage.required'=>'نسبة خصم المريض مطلوب',
            #######################################################################
            'company_rate.required'=>'نسبة تحمل شركة التأمين مطلوب',
            #######################################################################
            'notes.min'=>'يجب ان يكون ملاحظاتك أكثر من 10 أحرف',
            'notes.max'=>'يجب ان يكون ملاحظاتك أقل من 2500 أحرف',
            #######################################################################

        ];
    }
}
