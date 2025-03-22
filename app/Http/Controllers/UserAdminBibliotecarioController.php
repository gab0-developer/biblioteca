<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuariosRequest;
use App\Models\Ciudadano;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAdminBibliotecarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$UsersRoles = User::role('administrador')->role('bibliotecario')->role('lector')->get();
        # code...
        $UsersRoles = User::role($request->rol)->get();
        $roles = Role::all();
        return view('UsersAdminBibliotecario.index',compact('UsersRoles','roles'));
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
    public function store(UsuariosRequest $request)
    {
        //
        // return $request;
        $user = User::create([
            'name' => $request->nombre_usuario,
            'email' => $request->correo_usuario,
            'password' => Hash::make($request->password_confirmation)
        ]);
        $ciudadano= Ciudadano::create([
            'nombre_completo' => $request->nombre_usuario,
            'apellido_completo' => $request->apellido_usuario,
            'telefono' => $request->telefono_usuario,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'user_id' => $user->id,
        ]);
        // asignar rol lector
        $user->roles()->sync($request->rol_usuario);

        return redirect()->back()->with('success', "Usuario $user->name, registrado exitosamente"); 
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user= User::find($id);
        $ciudadano= Ciudadano::where('user_id',$id)->get();
        return [
            "user" => $user,
            "ciudadano" => $ciudadano
        ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // return $id;
        $user= User::find($id);
        $role = Role::all();
         // Obtén los permisos asignados al rol
        $rolesAsignadosuser = $user->roles->pluck('id')->toArray();
        $ciudadano= Ciudadano::where('user_id',$id)->get();
        return [
            "user" => $user,
            'roles' => $role, 
            'rolesAsignadosuser' => $rolesAsignadosuser,
            "ciudadano" => $ciudadano
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user= User::find($id);
        $user->update([
            'email' => $request->correo_usuario
        ]);
        $user->roles()->sync($request->roles);
        
        $ciudadano= Ciudadano::where('user_id',$id)->get();
        $ciudadano[0]->update([
            'nombre_completo' => $request->nombre_usuario	,
            'apellido_completo' => $request->apellido_usuario	,
            'telefono' => $request->telefono_usuario	,
            'fecha_nacimiento' => $request->fecha_nacimiento	,
        ]);

        return redirect()->back()->with('success',"Usuario : $user->name modificado exitosamente" );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user= User::find($id);
        $user->delete();

        return redirect()->back()->with('success', "Usuario: $user->name eliminado permanente");  
    }
}
