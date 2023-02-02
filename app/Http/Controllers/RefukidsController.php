<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRefukidsRequest;
use App\Models\Membro;
use App\Repositories\Interfaces\MembroRepositoryInterface;
use App\Repositories\Interfaces\RedeRepositoryInterface;
use App\Repositories\Interfaces\RefukidsRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class RefukidsController extends Controller
{
    public function __construct(
        private RefukidsRepositoryInterface $refukidsRepository,
        private MembroRepositoryInterface $membrosRepository,
        private RedeRepositoryInterface $redeRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pagina()
    {
        $redes = $this->redeRepository
            ->buscarTodos(['id', 'nome'])
            ->load([
                'celulas' => function ($query) {
                    $query->select(['id', 'nome', 'rede_id']);
                }
            ]);

        return view('refukids', compact('redes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRefukidsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(StoreRefukidsRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $criancaAtributos = $request->get('crianca');
            $jaTemEssaCrianca = Membro::where(Arr::only($criancaAtributos, ['celula_id', 'nome', 'nascimento', 'sexo']))
                ->count();
            if ($jaTemEssaCrianca) {
                return back()->withInput()->withErrors(['exception' => 'Essa criança já foi cadastrada']);
            }   

            $criancaAtributos['foto'] = $request->file('crianca.foto')->store('membros');
            $crianca = $this->membrosRepository->salvar($criancaAtributos);

            $responsavelAtributos = $request->get('responsavel');
            $responsavel = Membro::where(Arr::only($responsavelAtributos, ['celula_id', 'nome', 'nascimento', 'sexo']))
                ->first();
            if (!$responsavel) {
                $responsavelAtributos['foto'] = $request->file('responsavel.foto')->store('membros');
                $responsavel = $this->membrosRepository->salvar($responsavelAtributos);
            }

            $this->refukidsRepository->salvar([
                "crianca_id" => $crianca->id,
                "responsavel_id" => $responsavel->id
            ]);

            return back()->with('refukids-cadastro-sucesso', true);
        });
    }
}
