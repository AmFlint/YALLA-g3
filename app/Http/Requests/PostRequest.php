<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|max:100',
            'category_id' => 'required',
            'summary' => 'required|max:300',
            'card' => 'required',
            'locale' => 'required',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vous devez indiquer un titre pour l\'Article.',
            'category_id.required'  => 'Vous devez associer une catégorie à votre article',
            'summary.required' => 'Vous devez indiquer un résumé de l\'Article',
            'image.required' => 'Vous devez assigner une image qui représentera l\'Article',
            'summary.max' => 'Votre résumé ne doit pas comprendre plus de 300 caractères.',
            'title.max' => 'Votre titre ne doit pas comprendre plus de 150 caractères.'
        ];
    }
}
