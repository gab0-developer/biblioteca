<?php

namespace App\Http\Controllers;

use App\Models\Ciudadano;
use App\Models\Estatus;
use App\Models\SolicitudLibro;
use App\Models\ViewPostgreModel;
use DragonCode\Contracts\Cashier\Auth\Auth;
use Illuminate\Http\Request;

class solicitudLibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $viewPostgre = new ViewPostgreModel();
        $solicitudLibros= $viewPostgre->SolicitudLibrosView();
        $estatus = Estatus::all();
        $estatusID = Estatus::whereIn('id', [3, 4, 5])->get();
        return view('solicitudLibros.index',compact('solicitudLibros','estatusID'));
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
        $authUser= Auth()->user();
        $ciudadano = Ciudadano::where('user_id',$authUser->id)->get();
        $estatu= '5'; //EN ESPERA
        // $ciudadano[0]->id   --ID DEL CIUDADANO
        // $request->libro_id  -- ID DEL LIBRO
        // 5  -- ESTATUS DE SOLICITU "EN ESPERA" QUE SE GUARDA POR DEFECTO
        $solicitudLibro= SolicitudLibro::create([
            'estatu_id' => $estatu,
            'ciudadano_id' => $ciudadano[0]->id,
            'libro_id' => $request->libro_id,
        ]);
        return redirect()->back()->with('success', 'Libro solicitado exitosamente'); 
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
        $viewPostgre = new ViewPostgreModel();
        $solicitudLibros= $viewPostgre->SolicitudLibrosView($id);
        return ['solicitudLibro' => $solicitudLibros];
        // return view('solicitudLibros.index',compact('solicitudLibros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $solicitudLibro= SolicitudLibro::find($id);
        $solicitudLibro->update([
            'estatu_id' => $request->estatus,
        ]);
        if ($request->estatus == '3') {
            # code...
            return redirect()->back()->with('success', 'Solicitud Aceptada'); 
        }elseif ($request->estatus == '4') {
            # code...
            return redirect()->back()->with('success', 'Solicitud Rechazada'); 
        }else{
            # code...
            return redirect()->back()->with('success', 'Solicitud En espera'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $solicitudLibro= SolicitudLibro::find($id);
        $solicitudLibro->delete();

        return redirect()->back()->with('success', "Solicitud eliminada permanente");  
    }
}
