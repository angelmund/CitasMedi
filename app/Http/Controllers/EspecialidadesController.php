<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Especialidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EspecialidadesController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $especialidades = Especialidad::all();
            return view('especialidades.index', compact('especialidades'));
        }
    }

    public function create()
    {
        if (Auth::check()) {
            return view('especialidades.create');
        }
    }

    public function store(Request $request)
    {
        if (Auth::check()) {

            try {
                // Valida los campos que vienen en el request
                $validator = Validator::make($request->all(), [
                    'nombre' => 'required|unique:especialidades,nombre|max:150',
                    'descripcion' => 'required'
                ], [
                    'nombre.required' => 'El nombre de la especialidad es obligatorio',
                    'nombre.unique' => 'El nombre de la especialidad ya existe',
                    'descripcion.required' => 'El nombre abreviado es obligatorio',
                ]);

                // Si la validación falla, retorna un mensaje de error
                if ($validator->fails()) {
                    return response()->json([
                        'mensaje' => $validator->errors()->first(),
                        'idnotificacion' => 3
                    ]);
                }



                DB::beginTransaction();
                $especialidad = new Especialidad();
                $especialidad->nombre = Str::upper($request->input('nombre'));
                $especialidad->descripcion = Str::upper($request->input('descripcion'));
                $especialidad->save();
                DB::commit();

                return response()->json([
                    'mensaje' => 'Especialidad creada correctamente',
                    'idnotificacion' => 1,
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => 'Error al guardar la especialidad',
                    'idnotificacion' => 2,
                ]);
            }
        }
    }

    public function edit(Request $request, $idEspecialidad)
    {
        if (Auth::check()) {
            $especialidad = Especialidad::find($idEspecialidad);
            return view('especialidades.edit', compact('especialidad'));
        }
    }

    public function update(Request $request, $idEspecialidad)
    {
        if (Auth::check()) {

            try {

                // Valida los campos que vienen en el request
                $validator = Validator::make($request->all(), [
                    'nombre' => [
                        'required',
                        Rule::unique('especialidades', 'nombre')->ignore($idEspecialidad),
                        'max:150'
                    ],
                    'descripcion' => 'required'
                ], [
                    'nombre.required' => 'El nombre de la especialidad es obligatorio',
                    'nombre.unique' => 'El nombre de la especialidad ya existe',
                    'descripcion.required' => 'La descripción es obligatoria',
                ]);

                // Si la validación falla, retorna un mensaje de error
                if ($validator->fails()) {
                    return response()->json([
                        'mensaje' => $validator->errors()->first(),
                        'idnotificacion' => 3
                    ]);
                }

                DB::beginTransaction();
                $especialidad = Especialidad::find($idEspecialidad);
                $especialidad->nombre = Str::upper($request->input('nombre'));
                $especialidad->descripcion = Str::upper($request->input('descripcion'));
                $especialidad->save();
                DB::commit();

                return response()->json([
                    'mensaje' => 'Especialidad actualizada correctamente',
                    'idnotificacion' => 1,
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => 'Error al actualizar la especialidad',
                    'idnotificacion' => 2,
                ]);
            }
        }
    }

    public function desactivarEspecialidad($idEspecialidad)
    {
        if (Auth::check()) {
            try {
                DB::beginTransaction();
                $especialidad = Especialidad::find($idEspecialidad);
                $especialidad->activo = false;
                $especialidad->save();
                DB::commit();

                return response()->json([
                    'mensaje' => 'Especialidad desactivaa correctamente',
                    'idnotificacion' => 1,
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => 'Error al desactivar la especialidad',
                    'idnotificacion' => 2,
                ]);
            }
        }
    }
}
