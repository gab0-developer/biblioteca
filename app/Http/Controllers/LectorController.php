<?php

namespace App\Http\Controllers;

use App\Http\Requests\LectorRequest;
use App\Models\Lector;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('lector.index');
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
    public function store(LectorRequest $request)
    {
        //
        // return $request;
        $user = User::create([
            'name' => $request->nombre_lector,
            'email' => $request->correo_lector,
            'password' => Hash::make($request->password_confirmation)
        ]);
        $lector= Lector::create([
            'nombre_completo' => $request->nombre_lector,
            'apellido_completo' => $request->apellido_lector,
            'telefono' => $request->telefono_lector,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'user_id' => $user->id,
        ]);
        // asignar rol lector
        $user->roles()->sync($request->rol_lector);

        return redirect('/')->with('success', 'Registro éxitoso');
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
