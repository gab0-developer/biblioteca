<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\SolicitudLibro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $libros = Libro::count();
        $solicitudes = SolicitudLibro::count();
        // graficas
        $solicitudesMonth = DB::table('solicitud_libro')
            ->select(DB::raw('TO_CHAR(fecha_registro, \'MM\') as mes'), DB::raw('COUNT(*) as cantidad'))
            ->groupBy(DB::raw('TO_CHAR(fecha_registro, \'MM\')'))
            ->orderBy(DB::raw('TO_CHAR(fecha_registro, \'MM\')'))
            ->get()
        ;
        // return $solicitudesMonth;
        $solicitudesYear = DB::table('solicitud_libro')
            ->select(DB::raw('TO_CHAR(fecha_registro, \'YYYY\') as year'), DB::raw('COUNT(*) as cantidad'))
            ->groupBy(DB::raw('TO_CHAR(fecha_registro, \'YYYY\')'))
            ->orderBy(DB::raw('TO_CHAR(fecha_registro, \'YYYY\')'))
            ->get()
        ;
        return view('dashboard',[
            'libros' => $libros,
            'solicitudes' =>$solicitudes,
            'solicitudesMonth' =>$solicitudesMonth,
            'solicitudesYear' =>$solicitudesYear,
        ]);
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
