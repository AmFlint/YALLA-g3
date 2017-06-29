<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequestEdit extends FormRequest
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
            'meta_description' => 'required|max:250'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vous devez indiquer un titre pour l\'Article.',
            'category_id.required'  => 'Vous devez associer une catégorie à votre article',
            'summary.required' => 'Vous devez indiquer un résumé de l\'Article',
            'summary.max' => 'Votre résumé ne doit pas comprendre plus de 300 caractères.',
            'title.max' => 'Votre titre ne doit pas comprendre plus de 100 caractères.',
            'meta_description.required' => 'La description (référencement) est requise pour le bon référencement par les moteurs de recherches de votre site.',
            'meta_description.max' => 'La description (référencement) ne doit pas excéder 250 caractères',
        ];
    }
}
