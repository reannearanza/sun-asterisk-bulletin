<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:' . config('bulletin.articles.title_max_length')
            ],
            'content' => [
                'required',
                'string',
                'max:' . config('bulletin.articles.content_max_length')
            ]
        ];
    }
}
