<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Especialidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EspecialidadesController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $especialidades = Especialidad::all();
            return view('especialidades.index', compact('especialidades'));
        }
    }

    public function create()
    {
        if(Auth::check()){
            return view('especialidades.create');
        }
    }
}
