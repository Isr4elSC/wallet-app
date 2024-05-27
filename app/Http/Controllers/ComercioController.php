<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comercio;

class ComercioController extends Controller
{
    //

    public function index()
    {
        $comercios = Comercio::all();
        // return response()->json($comercios);
        return view('comercio', compact('comercios'));
    }
}
