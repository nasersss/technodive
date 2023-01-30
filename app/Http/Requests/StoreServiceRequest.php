<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        return [
            Validator::validate($request->all(), [
                'titleAr'=>['required'],
                'titleEn'=>['required'],
                'descriptionAr'=>['required'],
                'descriptionEn'=>['required'],
            ], [
                'titleAr.required' => 'يجب تعبية هذا الحقل',
                'titleEn.required' => 'يجب تعبية هذا الحقل',
                'descriptionAr.required' => 'يجب تعبية هذا الحقل',
                'descriptionEn.required' => 'يجب تعبية هذا الحقل',
                
            ]),
        ];
    }
}
