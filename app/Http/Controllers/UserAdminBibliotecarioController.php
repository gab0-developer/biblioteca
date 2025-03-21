<?php

namespace App\Http\Controllers;

use App\Http\Requests\LectorRequest;
use App\Http\Requests\UsuariosRequest;
use App\Models\Bibliotecario;
use App\Models\Lector;
use App\Models\Role;
use App\Models\User;
use App\Models\UserAdmin;
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
        if ($request->rol_usuario == '1') { //admin
            # code...
            // return 'USUARIO ADMIN';
            $user = User::create([
                'name' => $request->nombre_usuario,
                'email' => $request->correo_usuario,
                'password' => Hash::make($request->password_confirmation)
            ]);
            $lector= UserAdmin::create([
                'nombre_completo' => $request->nombre_usuario,
                'apellido_completo' => $request->apellido_usuario,
                'telefono' => $request->telefono_usuario,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'user_id' => $user->id,
            ]);
            // asignar rol lector
            $user->roles()->sync($request->rol_usuario);
    
            return redirect()->back()->with('success', 'Usuario registrado exitosamente'); 
        }elseif ($request->rol_usuario == '2') { // bibliotecario
            # code...
            // return 'USUARIO BIBLIOTECARIO';

            $user = User::create([
                'name' => $request->nombre_usuario,
                'email' => $request->correo_usuario,
                'password' => Hash::make($request->password_confirmation)
            ]);
            $lector= Bibliotecario::create([
                'nombre_completo' => $request->nombre_usuario,
                'apellido_completo' => $request->apellido_usuario,
                'telefono' => $request->telefono_usuario,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'user_id' => $user->id,
            ]);
            // asignar rol lector
            $user->roles()->sync($request->rol_usuario);
    
            return redirect()->back()->with('success', 'Usuario registrado exitosamente'); 
        }else { //lector
            # code...
            // return 'USUARIO LECTOR';

            $user = User::create([
                'name' => $request->nombre_usuario,
                'email' => $request->correo_usuario,
                'password' => Hash::make($request->password_confirmation)
            ]);
            $lector= Lector::create([
                'nombre_completo' => $request->nombre_usuario,
                'apellido_completo' => $request->apellido_usuario,
                'telefono' => $request->telefono_usuario,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'user_id' => $user->id,
            ]);
            // asignar rol lector
            $user->roles()->sync($request->rol_usuario);
    
            return redirect()->back()->with('success', 'Usuario registrado exitosamente'); 
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
