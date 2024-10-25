<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $usuarios = User::all();
            return view('admin.usuarios.index', compact('usuarios'));
        }else{
            return redirect()->route('/');
        }
    }
}
