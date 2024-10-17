<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ServiciosController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $servicios = Servicio::all();
            return view('servicios.index', compact('servicios'));
        } else {
            return redirect('/');
        }
    }

    public function create()
    {
        if (Auth::check()) {
            return view('servicios.create');
        } else {
            return redirect('/');
        }
    }
    public function store(Request $request){
        try {
            // Validación
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255|unique:servicios,nombre',
                'descripcion' => 'nullable|string',
                'precio' => 'required|numeric',
                'color' => 'required|string|size:7',
            ], [
                'nombre.required' => 'El nombre del servicio es obligatorio',
                'nombre.unique' => 'Ya existe un servicio con ese nombre',
                'precio.required' => 'El precio es obligatorio',
                'color.required' => 'El color es obligatorio',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'mensaje' => $validator->errors()->first(),
                    'idnotificacion' => 3,
                ]);
            }

            DB::beginTransaction();

            $servicio = new Servicio();
            $servicio->nombre = Str::upper($request->input('nombre'));
            $servicio->descripcion = $request->input('descripcion');
            $servicio->precio = $request->input('precio');
            $servicio->color = $request->input('color');
            $servicio->save();

            DB::commit();

            return response()->json([
                'mensaje' => 'Servicio creado correctamente',
                'idnotificacion' => 1,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'mensaje' => 'Error al guardar el servicio: ' . $e->getMessage(),
                'idnotificacion' => 3,
            ]);
        }
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('servicios.edit', compact('servicio'));
    }

    public function update(Request $request, $id){
        try {
            // Validación
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255|unique:servicios,nombre,' . $id,
                'descripcion' => 'nullable|string',
                'precio' => 'required|numeric',
                'color' => 'required|string|size:7', 
            ], [
                'nombre.required' => 'El nombre del servicio es obligatorio',
                'nombre.unique' => 'Ya existe un servicio con ese nombre',
                'precio.required' => 'El precio es obligatorio',
                'color.required' => 'El color es obligatorio',
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'mensaje' => $validator->errors()->first(),
                    'idnotificacion' => 3,
                ]);
            }
    
            DB::beginTransaction();
    
            $servicio = Servicio::findOrFail($id);
            $servicio->nombre = Str::upper($request->input('nombre'));
            $servicio->descripcion = $request->input('descripcion');
            $servicio->precio = $request->input('precio');
            $servicio->color = $request->input('color');
            $servicio->save();
    
            DB::commit();
    
            return response()->json([
                'mensaje' => 'Servicio actualizado correctamente',
                'idnotificacion' => 1,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'mensaje' => 'Error al actualizar el servicio: ' . $e->getMessage(),
                'idnotificacion' => 3,
            ]);
        }
    }
    
}
