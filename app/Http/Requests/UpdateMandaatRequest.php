<?php

namespace App\Http\Requests;

use App\Models\Mandaat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMandaatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mandaat_edit');
    }

    public function rules()
    {
        return [
            'ledenid_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'required',
            ],
            'mandaadnr' => [
                'string',
                'nullable',
            ],
            'start_mandaat' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'einde_mandaat' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
