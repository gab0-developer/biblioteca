@extends('adminlte::page')

@section('title', 'Solicitud de libros')

@section('content_header')
    <h1>Libros solicitados</h1>
@stop

@section('content')
    
     <div class="card">
        <div class="card-body">
            {{-- <div class="mb-3">
                <button class="btn btn-primary text-white"><a href="{{route('roles.create')}}" class="text-white" >Nuevo rol</a></button>
            </div> --}}
            {{-- Setup data for datatables --}}
            @php
            $heads = [
                'CIUDADANO',
                'LIBRO',
                'CATEGORIA',
                'ESTATU',
                ['label' => 'ACCIONES', 'no-export' => true, 'width' => 5],
            ];

            $btnEdit = '<button class="btn btn-xs btn-default text-primary  shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button>';
            $btnDetails = '<button class="btn btn-xs btn-default text-teal  shadow" title="Details">
                <i class="fa fa-lg fa-fw fa-eye"></i>
            </button>';
            $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger  shadow" title="Delete">
                <i class="fa fa-lg fa-fw fa-trash"></i>
            </button>';
            
            $config = [
                
            ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            
            <x-adminlte-datatable id="table1" class="text text-center" :heads="$heads">
                @foreach($solicitudLibros as $solicitud)
                    <tr>
                        <td>{{$solicitud->nombre_completo}} {{$solicitud->apellido_completo}}</td>
                        <td>{{$solicitud->titulo}}</td>
                        <td>{{$solicitud->nombre_categoria}}</td>
                        <td>{{$solicitud->estatu}}</td>
                        
                        <td class="d-flex"> 
                            
                            {{-- data-url: Permite mantener la URL asociada con cada botón --}}
                            <button class="btn btn-xs btn-default text-primary shadow btn-edit" 
                                
                                data-url="{{ route('solicitudLibro.edit', $solicitud->id) }}" 
                                data-update="{{ route('solicitudLibro.update', $solicitud->id) }}" 
                                title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                            
                            <form action="{{route('solicitudLibro.destroy',$solicitud->id)}}" method="post" class="form_eliminar">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form>

                            <button class="btn btn-xs btn-default text-teal shadow btn-details" 
                                
                                data-url="{{ route('solicitudLibro.show', $solicitud->id) }}" 
                                title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>
                            {{-- {!! $btnDetails !!} --}}
                            {{-- {{$client->id}} --}}
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>

    <div>
        @include('solicitudLibros.updateSolicitudLibro')
        {{-- @include('solicitudLibro.show') --}}
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
    {{-- <link rel="stylesheet" href="{{asset('assets/css/app.css')}}"> --}}
@stop

@section('js')
    <script>
        $(document).ready(function(){

            // editar

            $('.btn-edit').on('click',function (event) {
                event.preventDefault()
                let url = $(this).data('url')
                let update = $(this).data('update')

                console.log('url: ',url)

                $.get(url,function (data) {
                    let data_solicitud= data.solicitudLibro[0];
                    // let data_user= data.user;

                    // // Formatear la fecha a YYYY-MM-DD
                    let fechaRegistroSolicitud = data_solicitud.fecha_registro_solicitud.split(' ')[0]; 
                    
                    $('#nombre_usuario').val(data_solicitud.nombre_completo)
                    $('#apellido_usuario').val(data_solicitud.apellido_completo)
                    $('#telefono_usuario').val(data_solicitud.telefono)
                    $('#fecha_regsitro_solicitud').val(fechaRegistroSolicitud)
                    $('#titulo_libro').val(data_solicitud.titulo)
                    $('#autor_libro').val(data_solicitud.autor)
                    $('#categoria_libro').val(data_solicitud.nombre_categoria)
                    $('#editorial_libro').val(data_solicitud.editorial)
                    // Seleccionar el valor actual en el dropdown
                    // .trigger('change') para asegurar que cualquier evento vinculado se active
                    $('#estatus').val(data_solicitud.estatu_id).trigger('change');
                })
                // crear atributo "action" y agregar ruta
                $('#editForm').attr('action',update); 
                // Mostrar el modal
                $('#editModal').modal('show'); 

            });

            
            $('.btn-details').on('click',function (event) {
                event.preventDefault()
                var url = $(this).data('url')

                console.log('url: ',url)

                $.get(url,function (data) {

                    console.log('data: ',data)
                    let data_user= data.user;
                    let data_ciudadano= data.ciudadano[0];
                    
                    console.log('data_user: ',data_user)
                    console.log('data_ciudadano: ',data_ciudadano)

                    // Formatear la fecha a YYYY-MM-DD
                    let fechaNacimiento = data_ciudadano.fecha_nacimiento.split('T')[0]; 
                    let fechaRegistro = data_ciudadano.fecha_registro.split('T')[0]; 
                    
                    $('#nombre_usuario_show').val(data_ciudadano.nombre_completo)
                    $('#apellido_usuario_show').val(data_ciudadano.apellido_completo)
                    $('#correo_usuario_show').val(data_user.email)
                    $('#telefono_usuario_show').val(data_ciudadano.telefono)
                    $('#fecha_nacimiento_show').val(fechaNacimiento)
                    $('#fecha_registro_show').val(fechaRegistro)
                })
                // Mostrar el modal
                $('#showModal').modal('show'); 

            });
            

            // --------BOTON DE ELIMINAR 
            $('.form_eliminar').submit(function(e){
                e.preventDefault();
                Swal.fire({
                    title: "Esta seguro de eliminar el cliente?",
                    text: "Este cliente será eliminado permanentemente!",
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
            });
        })
    </script>
@stop

    

    
  
