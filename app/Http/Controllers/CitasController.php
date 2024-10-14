<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitasController extends Controller
{
    public function index ()
    {
        if(Auth::check())
        {
            $citas = Cita::all();
            return View('citas.index', compact('citas'));
        }
    }

    public function create ()
    {
        if(Auth::check())
        {
            $servicios = Servicio::all();
            return view('citas.create', compact('servicios'));
        }
    }
}
