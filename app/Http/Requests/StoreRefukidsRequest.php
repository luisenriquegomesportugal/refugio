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
            [
                "responsavel" => "required",
                "responsavel.*.telefone" => "required"
            ],
            Arr::prependKeysWith($regras, 'responsavel.*.')
        );
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        $membroAtributos = $this->storeMembroRequest->attributes();
        $responsavelAtributos = Arr::map($membroAtributos, function ($value) {
            return "{$value} do responsável";
        });

        return array_merge(
            Arr::prependKeysWith($membroAtributos, 'crianca.'),
            [
                "responsavel" => "Responsáveis",
                "responsavel.*.telefone" => "Telefone do responsável"
            ],
            Arr::prependKeysWith($responsavelAtributos, 'responsavel.*.')
        );
    }
}
