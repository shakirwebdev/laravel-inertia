<?php

namespace App\Http\Requests\Sentence;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSentenceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'text' => ['required', 'string', 'max:255'],
            'row' => ['required', 'integer', 'min:1', 'max:4'],
            'col' => ['required', 'integer', 'min:1', 'max:4'],
            'css' => ['required', 'string', 'max:255'],
        ];
    }
}
