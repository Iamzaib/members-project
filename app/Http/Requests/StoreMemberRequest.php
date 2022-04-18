<?php

namespace App\Http\Requests;

use App\Models\Member;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMemberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('member_create');
    }

    public function rules()
    {
        return [
            'ledenid' => [
                'string',
                'required',
                'unique:members',
            ],
            'status' => [
                'required',
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
                'string',
                'nullable',
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
            ],
        ];
    }
}
