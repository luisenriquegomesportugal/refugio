<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EncontreUmaCelulaController extends Controller
{
    public function buscarCelulas()
    {
        $result = [];
        $csv = file_get_contents(env('SHEET_URL'));
        $linhas = array_map('str_getcsv', explode("\n", $csv));

        foreach ($linhas as $linha) {
            list(, $rede, $celula, $cidade, $bairro, $rua, $complemento, $cep, $lider, $telefone) = $linha;

            $address = "{$rua} - {$bairro}, {$cep}, {$cidade}";
            $geo_url = env('GEO_URL') . "?address=" . urlencode($address) . "&key=" . env('GOOGLE_KEY');
            $json = file_get_contents($geo_url);
            $geo = json_decode($json);

            if ($geo->status == 'OK') {
                list($place,) = $geo->results;
                array_push($result, [
                    'number' => $celula,
                    'location' => [
                        'lat' => $place->geometry->location->lat,
                        'lng' => $place->geometry->location->lng
                    ]
                ]);
            }
        }

        return response()->json($result);
    }

    public function entrarEmContato(Request $request)
    {
        $celula = $request->input('number');
        $nome = $request->input('name');
        $idade = $request->input('age');
        $telefone = $request->input('phone');

        if (!$celula || !$nome || !$idade || !$telefone) {
            return response('', 400);
        }

        $url = env('CALLME_URL');
        $query = http_build_query([
            'phone' => env('CALLME_PHONE'),
            'apikey' => env('CALLME_APIKEY'),
            'text' => "Gostaria de visitar a *Refúgio {$celula}* (_enviado pelo site_).\n\n*Nome:* {$nome}\n*Idade:* {$idade}\n*Telefone:* {$telefone}"
        ]);

        shell_exec("curl '{$url}?{$query}'");

        return response('');
    }
}
