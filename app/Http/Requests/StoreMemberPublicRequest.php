<?php

namespace App\Http\Requests;

use App\Models\Member;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMemberPublicRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
//            'ledenid' => [
//                'string',
//                'required',
//                'unique:members',
//            ],
//            'status' => [
//                'required',
//            ],
            recaptchaFieldName() => [
                recaptchaRuleName()
            ],
            'first_name' => [
                'string',
                'required',
            ],
            'surname' => [
                'string',
                'nullable',
            ],
            'street_name' => [
                'string',
                'required',
            ],
            'house_number' => [
                'string',
                'nullable',
            ],
            'zip_code' => [
                'string',
                'required',
            ],
            'town' => [
                'string',
                'nullable',
            ],
            'land' => [
                'string',
                'nullable',
            ],
            'enamel' => [
                'email',
                'required',
                'unique:members',
            ],
            'date_of_birth' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'gender' => [
                'required',
            ],
            'birthplace' => [
                'string',
                'nullable',
            ],
            'iban' => [
                'string',
                'nullable',
            ]
            , 'terms_1' => [
                'string',
                'nullable',
            ]
            , 'terms_2' => [
                'string',
                'required',
            ],
        ];
    }
}
