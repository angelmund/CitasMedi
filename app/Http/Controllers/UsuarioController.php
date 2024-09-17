<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('usuarios.index');
        }else{
            return redirect()->route('/');
        }
    }
}
