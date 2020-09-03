<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsCreateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'author' => 'required|string|min:5|max:100',
            'title' => 'required|string|min:5|max:100',
            'body' => ['sometimes', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'заголовок',
            'author' => 'автор',
            'body' => 'текст новости',
        ];
    }
}
