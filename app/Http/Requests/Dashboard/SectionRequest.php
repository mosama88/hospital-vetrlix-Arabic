<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            'name'=> 'required|string|min:5|max:100',
            'description'=> 'required|string|min:10|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=>'أسم القسم مطلوب',
            'name.min'=>'يجب ان يكون أسم القسم أكثر من 5 أحرف',
            'name.max'=>'يجب ان يكون أسم القسم أقل من 100 أحرف',
            #######################################################################
            'description.required'=>'وصف القسم مطلوب',
            'description.min'=>'يجب ان يكون وصف القسم أكثر من 10 أحرف',
            'description.max'=>'يجب ان يكون وصف القسم أقل من 2000 أحرف',
            #######################################################################
        ];
    }
}
