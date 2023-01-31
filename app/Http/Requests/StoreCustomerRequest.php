<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreCustomerRequest extends FormRequest
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
            // Validator::validate($request->all(), [
            //     'nameEn'=>'[required]',
            //     'nameAr'=>'[required]',
            //     'jobEn'=>'[required]',
            //     'jobAr'=>'[required]',
            //     'descriptionEn'=>'[required]',
            //     'descriptionAr'=>'[required]',
            // ], [
            //     'titleAr.required' => 'يجب تعبية هذا الحقل',
            //     'titleEn.required' => 'يجب تعبية هذا الحقل',
            //     'jobEn.required'=> 'يجب تعبية هذا الحقل',
            //     'jobAr.required'=> 'يجب تعبية هذا الحقل',
            //     'descriptionAr.required' => 'يجب تعبية هذا الحقل',
            //     'descriptionEn.required' => 'يجب تعبية هذا الحقل',

            // ]),
        ];
    }
}
