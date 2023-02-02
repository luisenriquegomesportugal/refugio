<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class StoreRefukidsRequest extends FormRequest
{
    private StoreMembroRequest $storeMembroRequest;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->storeMembroRequest = new StoreMembroRequest();
        // dump($this->all());
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $regras = $this->storeMembroRequest->rules();

        return array_merge(
            Arr::prependKeysWith($regras, 'crianca.'),
            Arr::prependKeysWith($regras, 'responsavel.'),
            [
                "responsavel.telefone" => "required"
            ]
        );
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        $atributos = $this->storeMembroRequest->attributes();
        $responsavelAtributos = Arr::map($atributos, function ($value) {
            return "{$value} do responsável";
        });

        return array_merge(
            Arr::prependKeysWith($atributos, 'crianca.'),
            Arr::prependKeysWith($responsavelAtributos, 'responsavel.'),
            [
                "responsavel.telefone" => "Telefone do responsável"
            ]
        );
    }
}
