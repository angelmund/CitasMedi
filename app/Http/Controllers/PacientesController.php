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
                    'apellido_paterno' => 'required|max:150',
                    'apellido_materno' => 'required|max:150',
                    'telefono' => 'required',
                    'correo' => 'required|email',
                ], [
                    'nombre.required' => 'El nombre del paciente es obligatorio',
                    'apellido_paterno.required' => 'El apellido paterno del paciente es obligatorio',
                    'apellido_materno.required' => 'El apellido materno del paciente es obligatorio',
                    'telefono.required' => 'El teléfono del paciente es obligatorio',
                    'correo.required' => 'El correo del paciente es obligatorio',
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
                $paciente->apellido_paterno = Str::upper($request->input('apellido_paterno'));
                $paciente->apellido_materno = Str::upper($request->input('apellido_materno'));
                $paciente->telefono = $request->input('telefono');
                $paciente->correo = $request->input('correo');
                $paciente->save();
                DB::commit();

                return response()->json([
                    'mensaje' => 'Paciente creado correctamente',
                    'idnotificacion' => 1,
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => 'Error al guardar el paciente'. $e->getMessage(),
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
                    'apellido_paterno' => 'required|max:150',
                    'apellido_materno' => 'required|max:150',
                    'correo' => 'required|email',
                ], [
                    'nombre.required' => 'El nombre del paciente es obligatorio',
                    'apellido_paterno.required' => 'El apellido paterno del paciente es obligatorio',
                    'apellido_materno.required' => 'El apellido materno del paciente es obligatorio',
                    'telefono.required' => 'El teléfono del paciente es obligatorio',
                    'correo.required' => 'El correo del paciente es obligatorio',
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
                $paciente->apellido_paterno = Str::upper($request->input('apellido_paterno'));
                $paciente->apellido_materno = Str::upper($request->input('apellido_materno'));
                $paciente->telefono = $request->input('telefono');
                $paciente->correo = $request->input('correo');
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

