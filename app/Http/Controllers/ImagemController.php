<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImagemController extends Controller
{
    public function download(Request $request)
    {
        return Storage::download($request->get('file'));
    }
}
