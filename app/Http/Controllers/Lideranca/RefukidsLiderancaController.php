<?php

namespace App\Http\Controllers\Lideranca;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRefukidsRequest;
use App\Repositories\Interfaces\MembroRepositoryInterface;
use App\Repositories\Interfaces\RedeRepositoryInterface;
use App\Repositories\Interfaces\RefukidsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class RefukidsLiderancaController extends Controller
{
    public function __construct(
        private RefukidsRepositoryInterface $refukidsRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pagina(Request $request)
    {
        $refukids = $this->refukidsRepository
            ->listar()
            ->load(['crianca', 'responsavel'])
            ->groupBy('crianca_id')
            ->values();

        return view('lideranca.refukids.index', compact('refukids'));
    }
}
