<?php

namespace App\Http\Controllers;

use App\Models\Classs;
use App\Models\Maestro;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $maestros =Maestro::all();
        $classses=Classs::all();
        return view('admin/clases',compact('maestros','classses'));
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
        $newClasss = new Classs();
        $newClasss->name_class = $request->input('nombre').' '.$request->input('apellido');
        $newClasss->maestro_id = $request->input('asignacion');
        
        // Agrega otros campos y sus valores
        $newClasss->save();
        return redirect()->route('clases')->with('success', 'Registro actualizado correctamente'); 
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
        
        $classs= Classs::findOrFail($id);
        $classs->name_class = $request->input('nombre').' '.$request->input('apellido');
        $classs->maestro_id = $request->input('asignacion');
        $classs->save();
        return redirect()->route('clases')->with('success', 'Registro actualizado correctamente'); 
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registro = Classs::findOrFail($id);
        $registro->delete();
        return redirect()->route('clases')->with('success', 'Registro borrado correctamente');
    }
}
