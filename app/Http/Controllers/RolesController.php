<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
            $roles = Role::all();
            return view('admin.roles.index', compact('roles'));
        }else{
            return redirect()->route('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check()){
            return view('admin.roles.create');
        }else{
            return redirect()->route('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            try {
                DB::beginTransaction();
                $role = Role::create(['name' => $request->nombre]);
                DB::commit();
                return response()->json([
                    'mensaje' => 'Rol creado correctamente',
                    'idnotificacion' => 1,
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => 'Error al crear el rol',
                    'idnotificacion' => 3,
                ]);
            }
           
        }else{
            return redirect()->route('/');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(Auth::check()){
            $role = Role::find($id);
            return view('admin.roles.edit', compact('role'));
        }else{
            return redirect()->route('/');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(Auth::check()){
            try {
                DB::beginTransaction();
                $role = Role::find($id);
                $role->name = $request->input('nombre');
                $role->save();
                DB::commit();
                return response()->json([
                    'mensaje' => 'Rol actualizado correctamente',
                    'idnotificacion' => 1,
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    'mensaje' => 'Error al actualizar el rol',
                    'idnotificacion' => 3,
                ]);
            }
        }else{
            return redirect()->route('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
