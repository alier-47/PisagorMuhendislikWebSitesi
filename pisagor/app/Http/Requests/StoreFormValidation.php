<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormValidation extends FormRequest
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
            'baslik' => 'required|max:250',
            'icerik' => 'required',
            'images.*' => 'mimes:jpg,jpeg,png,gif|max:2047|nullable',
        ];
    }
    public function messages()
    {
        return [
            'baslik.required' => 'Lütfen Başlık alanını boş bırakmayınız',
            'baslik.max' => 'başlık alanı en fazla 100 harf olabilir',
            'icerik.required' => 'Lütfen İçerik alanını boş bırakmayınız',
            'images.*.mimes' => 'Resim Formatı jpf,jpeg,png veya gif olmalıdır',
        ];
    }
}
