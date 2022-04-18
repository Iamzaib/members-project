<?php

namespace App\Http\Requests;

use App\Models\Mandaat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMandaatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mandaat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mandaats,id',
        ];
    }
}
