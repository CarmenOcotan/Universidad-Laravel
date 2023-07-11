<?php

namespace App\Http\Controllers;

use App\Models\Classs;
use App\Models\Maestro;
use App\Models\User;
use Illuminate\Http\Request;

class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maestros = Maestro::all();
        $classses= Classs::all();
        return view('admin.maestros',compact('maestros','classses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nuevoUsuario = new User();
        $nuevoUsuario->	name = $request->input('nombre').' '.$request->input('apellido');
        $nuevoUsuario->email = $request->input('email');
        $password = $request->input('password');
        $nuevoUsuario->password= bcrypt($password);
        $nuevoUsuario->save();
        $nuevoUsuario->assignRole('maestro');
        $userId = $nuevoUsuario->id;
        $nuevoRegistro = new Maestro();
        $nuevoRegistro->id=null;
        $nuevoRegistro->user_id=$userId;
        $nuevoRegistro->firs_name = $request->input('nombre');
        $nuevoRegistro->last_name = $request->input('apellido');
        $nuevoRegistro->address = $request->input('direccion');
        $nuevoRegistro->bith_date = $request->input('fecha_cumple');
        
        $nuevoUsuario->assignRole('maestro');
        // Agrega otros campos y sus valores
        $nuevoRegistro->save();
        return redirect()->route('maestros')->with('success', 'Registro actualizado correctamente');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $registro = Maestro::findOrFail($id);
    
        // Validar los datos del formulario, si es necesario
        
        $registro->firs_name = $request->input('nombre');
        $registro->last_name = $request->input('apellido');
        $registro->address = $request->input('direccion');
        $registro->bith_date = $request->input('fecha_cumple');
        
        // Agregar otros campos que desees actualizar
        
        $registro->save();
    
        // Redirigir a la página de destino después de la actualización
        return redirect()->route('maestros')->with('success', 'Registro actualizado correctamente'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registro = Maestro::findOrFail($id);
        $registro->delete();
        return redirect()->route('maestros')->with('success', 'Registro borrado correctamente');
    
    }
}

