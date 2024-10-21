<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Paciente;

class PacientesController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $pacientes = Paciente::all();
            return view('pacientes.index', compact('pacientes'));
        }
    }

    public function create()
    {
        if (Auth::check()) {
            return view('pacientes.create');
        }
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            try {
                $validator = Validator::make($request->all(), [
                    'nombre' => 'required|max:150',
                    'apellido' => 'required|max:150',
                    'direccion' => 'required'
                ], [
                    'nombre.required' => 'El nombre del paciente es obligatorio',
                    'apellido.required' => 'El apellido del paciente es obligatorio',
                    'direccion.required' => 'La dirección es obligatoria',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'mensaje' => $validator->errors()->first(),
                        'idnotificacion' => 3
                    ]);
                }

                DB::beginTransaction();
                $paciente = new Paciente();
                $paciente->nombre = Str::upper($request->input('nombre'));
                $paciente->apellido = Str::upper($request->input('apellido'));
                $paciente->direccion = Str::upper($request->input('direccion'));
                $paciente->save();
                DB::commit();

                return response()->json([
                    'mensaje' => 'Paciente creado correctamente',
                    'idnotificacion' => 1,
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => 'Error al guardar el paciente',
                    'idnotificacion' => 2,
                ]);
            }
        }
    }

    public function edit(Request $request, $idPaciente)
    {
        if (Auth::check()) {
            $paciente = Paciente::find($idPaciente);
            return view('pacientes.edit', compact('paciente'));
        }
    }

    public function update(Request $request, $idPaciente)
    {
        if (Auth::check()) {
            try {
                $validator = Validator::make($request->all(), [
                    'nombre' => 'required|max:150',
                    'apellido' => 'required|max:150',
                    'direccion' => 'required'
                ], [
                    'nombre.required' => 'El nombre del paciente es obligatorio',
                    'apellido.required' => 'El apellido del paciente es obligatorio',
                    'direccion.required' => 'La dirección es obligatoria',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'mensaje' => $validator->errors()->first(),
                        'idnotificacion' => 3
                    ]);
                }

                DB::beginTransaction();
                $paciente = Paciente::find($idPaciente);
                $paciente->nombre = Str::upper($request->input('nombre'));
                $paciente->apellido = Str::upper($request->input('apellido'));
                $paciente->direccion = Str::upper($request->input('direccion'));
                $paciente->save();
                DB::commit();

                return response()->json([
                    'mensaje' => 'Paciente actualizado correctamente',
                    'idnotificacion' => 1,
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => 'Error al actualizar el paciente',
                    'idnotificacion' => 2,
                ]);
            }
        }
    }

    public function desactivarPaciente($idPaciente)
    {
        if (Auth::check()) {
            try {
                DB::beginTransaction();
                $paciente = Paciente::find($idPaciente);
                $paciente->activo = false;
                $paciente->save();
                DB::commit();

                return response()->json([
                    'mensaje' => 'Paciente desactivado correctamente',
                    'idnotificacion' => 1,
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => 'Error al desactivar el paciente',
                    'idnotificacion' => 2,
                ]);
            }
        }
    }
}
