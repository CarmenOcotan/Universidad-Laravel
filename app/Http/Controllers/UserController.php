<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        $roles = Role::all();
        return view('admin/permisos', ["admin"=>$usuarios, "roles" => $roles]);
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
        //
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
        $usuario = User::find($id);
        $estado = ($usuario->active) ? 'Activo' : 'Inactivo';
        $roles = Role::all();
        return $roles;

        // return view("admin/permisos", compact('usuario', 'roles'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            "email" => ['required', 'email']
        ]);

        //1 - Leer el rol que recibe
        $newRol = $request->rol;

        // 2 - traer todos los roles existentes

        $rolesDB = Role::all();
        $rolesNames = [];

        // 3 - Guardo los nombres de los roles en un arreglo. 
        foreach ($rolesDB as $rolDB){
            $rolesNames[] = $rolDB->name;
        }

        // 4- Compruebo de que el rol que he recibido existe en el arreglo de los roles existentes
        $rolExist = in_array($newRol, $rolesNames, true);

        $usuario = User::find($id);
        $usuario->email = $request->input ('email');
        $usuario->save();

        if ($rolExist){

            //remover los roles existentes en el usuario
            foreach ($rolesNames as $rol){
                $usuario->removeRole($rol);
            }

            //asigno el nuevo rol

            $usuario->assignRole($newRol);
        } else {
            return redirect()->route("admin.index", $usuario);
        }

        return redirect()->route("admin.index", $usuario)->with('status', 'profile-updated');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
/* 
return redirect()->route('alumnos')->with('success', 'Registro actualizado correctamente'); 

Route::put('/alumnos/update{id}', [StudentController::class,'update'])
->middleware(['auth','verified'])->name('alumnos.update'); */