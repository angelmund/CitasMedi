<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\CarreraModalidad;
use App\Models\Colegiatura;
use App\Models\Colegiaturas;
use App\Models\DetalleInscripción;
use App\Models\DetallesColegiatura;
use App\Models\Pago;
use App\Models\PagosTramite;
use App\Models\Servicio;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
      
        $servicios = Servicio::all();

        // Pasa la variable a la vista
        return view('dashboard.dashboard', compact('servicios'));
    }
}
