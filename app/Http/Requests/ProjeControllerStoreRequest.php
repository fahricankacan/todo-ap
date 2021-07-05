<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjeControllerStoreRequest extends FormRequest
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
            'proje_adi' => 'required',
            'proje_aciklamasi' => 'required',
            'baslangic_tarihi' => 'required',
            'bitis_tarihi' => 'required',
            'musteri_id' => 'required',
           // 'proje_fiyat' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ];
    }


    public function messages()
    {

        return [
            'proje_adi.required' => 'Proje adi eksik',
            'proje_aciklamasi.required' => 'Proje aaçıklaması eksik',
            'baslangic_tarihi.required' => 'Başlangıç tarihi eksik',
            'bitis_tarihi.required' => 'Teslim tarihi eksik',
            'musteri_id.required' => 'Müşteri adi eksik',
           // 'proje_fiyat.required.regex' =>'Fiyat eksik veya sadece harf kullanın'
            

        ];
    }
}
