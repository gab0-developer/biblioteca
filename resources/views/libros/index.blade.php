@extends('adminlte::page')

@section('title', 'Libros')

@section('content_header')
    <h1>Biblioteca</h1>
@stop

@section('content')
    


    <div>
        @include('libros.registerLibros')   
        @include('libros.updateLibros')   
    </div>

    <div class="container mt-3">
        <div class="card-deck d-flex justify-content-center flex-wrap">
            {{-- {{asset('assets/img/Taxonomía_de_Bloom.jpg')}} --}}
            @if (count($libros) > 0)
                
                @foreach ($libros as $libro)
                    <div class="card mb-3" style="min-width: 15rem; max-width: 15rem;">
                        <img src="{{asset('storage/'.$libro->imagen)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">{{$libro->titulo}}</h5>
                        <p class="card-text">{{$libro->editorial}}</p>
                        </div>
                        <div class="card-footer">
                        <small class="text-muted">{{$libro->autor}}</small>
                        </div>
                    </div>

                    <div class="btn-eventos d-flex flex-column">
                        <button class="btn btn-initial text-primary shadow btn-edit" title="Editar" style="display: flex; align-content: center"
                            data-url="{{ route('libros.edit', $libro->id) }}" 
                            data-update="{{ route('libros.update', $libro->id) }}" 
                            title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{route('libros.destroy', $libro->id)}}" method="post" class="form_delete">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-initial mt-2 text-danger shadow" title="Eliminar" style="display: flex; align-content: center">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            @else
                <p>no hay libros registrados</p>
            @endif
            
        </div>
    </div>


    {{--has: verifica si existe la clave, en este caso success y devuelve true o false dependiendo   --}}
    @if (Session::has('success')) 
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ Session::get('success') }}',
                    confirmButtonText: 'Aceptar'
                });
            });
        </script>
    @endif

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="{{asset('assets/css/card.css')}}">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // EVENTO PARA MOSTRAR NOMBRE DE ARCHIVO DE PORTADA DE LIBRO
            $('#inputGroupFile01').on('change', function() {
                // Obtener el nombre del archivo seleccionado
                var fileName = $(this).val().split('\\').pop();
                // Mostrar el nombre del archivo en el label
                $(this).next('.custom-file-label').html(fileName);
            });


            // EVENTO BOTON EDITAR
            $('.btn-edit').on('click', function(event) {
                event.preventDefault();
                var url = $(this).data('url');
                var update = $(this).data('update');

                // Realiza una solicitud AJAX para obtener los datos
                $.get(url, function(data) {
                    let dataLibro = data.data_libro
                    $('#titulo_libro').val(dataLibro.titulo)
                    $('#autor_libro').val(dataLibro.autor)
                    $('#editorial_libro').val(dataLibro.editorial)
                    $('#cantidad_libro').val(dataLibro.cantidad)

                    // **IMPORTANTE: SE DEBE ACTUALIZAR TAMBIEN LA "CATEGORIA-PORTADA DEL LIBRO Y FECHA_PUBLICACION"**

                })

                // crear atributo "action" para incluir la URL para la actualización
                $('#editForm').attr('action', update); 
                // Mostrar el modal
                $('#editModal').modal('show'); 
            });

            // ELIMINAR LIBRO
            $('.form_delete').submit(function(e){
                e.preventDefault()
                Swal.fire({
                    title: "Esta seguro de eliminar el libro?",
                    text: "Este libro será eliminado permanentemente!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                        // if (this.submit()) {
                        //     Swal.fire({
                        //     title: "Eliminado!",
                        //     text: "Cliente eliminado exitosamente.",
                        //     icon: "success"
                        //     });
                            
                        // }
                        
                    }
                });
            })
            
        });
    </script>
@stop