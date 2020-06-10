<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'author' => ['required', 'regex:/^[А-ЯA-ZЇІЄҐ][а-яёіїєґa-z]+\s[А-ЯA-ZЇІЄҐ][а-яёіїєґa-z]+$/ui'],
            'content' => ['required', 'string'],
        ];
    }
}
