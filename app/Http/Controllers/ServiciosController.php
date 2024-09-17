<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiciosController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $servicios = Servicio::all();
            return view('servicios.index', compact('servicios'));
        }else{
            return redirect('/');
        }
    }

    //definir la función para crear un nuevo servicio
    public function create()
    {
        if(Auth::check()){
            return view('servicios.create');
        }else{
            return redirect('/');
        }   
    }
}
