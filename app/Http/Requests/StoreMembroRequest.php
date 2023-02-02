<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMembroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "celula_id" => "required|exists:celulas,id",
            "nome" => "required",
            "sexo" => "required|in:M,F",
            "nascimento" => "required|date"
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            "celula_id" => "Célula",
            "nome" => "Nome",
            "foto" => "Foto",
            "nascimento" => "Data de nascimento",
            "sexo" => "Sexo"
        ];
    }
}
