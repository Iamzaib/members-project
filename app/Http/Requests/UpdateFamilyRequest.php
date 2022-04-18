<?php

namespace App\Http\Requests;

use App\Models\Family;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFamilyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('family_edit');
    }

    public function rules()
    {
        return [
            'family_member_type' => [
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
            'd_o_b' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'gender' => [
                'required',
            ],
            'status' => [
                'required',
            ],
            'birthplace' => [
                'string',
                'nullable',
            ],
        ];
    }
}
