<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Estatus;
use App\Models\Libro;
use App\Models\ViewPostgreModel;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = Categoria::all();
        $viewPostgre = new ViewPostgreModel();
        $libros= $viewPostgre->LibrosView();
        // return $libros[0]->imagen;
        return view('libros.index',compact('categorias','libros'));
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
        $estatus = Estatus::all();
        // return $request;
        // Inicializa la variable para la ruta de la imagen
        $routeImage = '';
        // Verifica si se ha subido un archivo
        if ($request->hasFile('portada_libro')) {
            $file = $request->file('portada_libro'); //obtiene el archivo (img)

            // Almacena el archivo y guarda la ruta
            $routeImage = $file->store('portadasLibros', 'public');
        }
        $libro = Libro::create([
            'titulo' => $request->titulo_libro,
            'autor' => $request->autor_libro,
            'editorial' => $request->editorial_libro,
            'cantidad' => $request->cantidad_libro,
            'fecha_publicacion' => $request->fecha_publicacion,
            'categoria_id' => $request->categoria_libro	,
            'estatu_id' => $estatus[0]->id,
		    'imagen' => $routeImage
        ]);

        return redirect()->back()->with('success', 'Libro registrado exitosamente'); 
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
        $libro = Libro::find($id);
        return ['data_libro' => $libro];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // return $request;
        $updateLibro = Libro::find($id);
        $updateLibro->update([
            'titulo' => $request->titulo_libro,
            'autor' => $request->autor_libro,
            'editorial' => $request->editorial_libro,
            'cantidad' => $request->cantidad_libro,
            // 'fecha_publicacion' => $request->fecha_publicacion,
            // 'categoria_id' => $request->categoria_libro	,
            // 'estatu_id' => $estatus[0]->id,
		    // 'imagen' => $routeImage
        ]);
        return redirect()->back()->with('success', 'Libro modificado exitosamente');  
        
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $libro = Libro::find($id);
        $libro->delete();
        
        return redirect()->back()->with('success', "Libro: $libro->titulo eliminado permanente");  
    }
}
