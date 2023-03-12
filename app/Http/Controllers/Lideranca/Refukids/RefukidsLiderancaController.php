<?php

namespace App\Http\Controllers\Lideranca\Refukids;

use App\Http\Controllers\Controller;
use App\Models\RefukidsCrianca;
use App\Repositories\Interfaces\RefukidsRepositoryInterface;
use Illuminate\Http\Request;

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
        $refukids = RefukidsCrianca::orderBy('nome')->paginate();

        return view('lideranca.refukids.index', compact('refukids'));
    }
}
