@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios del sistema</h1>
@stop

@section('content')
    <div>
        @include('UsersAdminBibliotecario.register')
    </div>

     {{-- CITAS REALIZADAS --}}

    <div class="container-filters-role mt-3 mb-3">
        <button type="button" class="btn btn-success ">
            <a class="text-light" href="{{route('UsersAdminBibliotecario.index',['rol' => 'administrador'])}}">{{ __('Administradores') }}</a>
        </button>
        <button type="button" class="btn btn-success ">
            <a class="text-light" href="{{route('UsersAdminBibliotecario.index',['rol' => 'bibliotecario'])}}">{{ __('bibliotecarios') }}</a>
        </button>
        <button type="button" class="btn btn-success ">
            <a class="text-light" href="{{route('UsersAdminBibliotecario.index',['rol' => 'lector'])}}">{{ __('Lectores') }}</a>
        </button>
    </div>
     <div class="card">
        <div class="card-body">
            {{-- <div class="mb-3">
                <button class="btn btn-primary text-white"><a href="{{route('roles.create')}}" class="text-white" >Nuevo rol</a></button>
            </div> --}}
            {{-- Setup data for datatables --}}
            @php
            $heads = [
                'USUARIO',
                'CORREO ELECTRÓNICO',
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
                @foreach($UsersRoles as $rol)
                    <tr>
                        <td>{{$rol->name}}</td>
                        <td>{{$rol->email}}</td>
                        
                        <td class="d-flex"> 
                            
                            {{-- data-url: Permite mantener la URL asociada con cada botón --}}
                            <button class="btn btn-xs btn-default text-primary shadow btn-edit" 
                                
                                data-url="{{ route('UsersAdminBibliotecario.edit', $rol->id) }}" 
                                data-update="{{ route('UsersAdminBibliotecario.update', $rol->id) }}" 
                                title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>
                            
                            <form action="{{route('UsersAdminBibliotecario.destroy',$rol->id)}}" method="post" class="form_eliminar">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form>

                            <button class="btn btn-xs btn-default text-teal shadow btn-details" 
                                
                                data-url="{{ route('UsersAdminBibliotecario.show', $rol->id) }}" 
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
        @include('UsersAdminBibliotecario.update')
        @include('UsersAdminBibliotecario.show')
    </div>


     {{--has: verifica si existe la clave, en este caso success y devuelve true o false dependiendo   --}}
    @if (Session::has('success')) 
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '{{ Session::get('success') }}',
                    confirmButtonText: 'Aceptar',
                    timer: 3000,
                    timerProgressBar: true,
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
                var url = $(this).data('url')
                var update = $(this).data('update')

                console.log('url: ',url)

                $.get(url,function (data) {

                    let data_user= data.user;
                    let data_ciudadano= data.ciudadano[0];
                    let roles = data.roles;
                    let rolesAsignadosuser = data.rolesAsignadosuser;

                    // Itera sobre el array de permisos y agrega cada uno al select
                    roles.map((rol) =>  {
                        // Crea una nueva opción
                        let option = $('<option></option>').attr('value', rol.id).text(rol.name);

                        // Marca la opción como seleccionada si está en el array de permisos asignados
                        if (rolesAsignadosuser.includes(rol.id)) {
                            option.prop('selected', true);
                        }

                        // Añade la opción al select
                        $('#select2_permiso').append(option);
                    });

                    // Inicializa Select2 o actualiza el estado si ya está inicializado
                    $('#select2_permiso').select2({theme: "classic"});

                    // Formatear la fecha a YYYY-MM-DD
                    let fechaNacimiento = data_ciudadano.fecha_nacimiento.split('T')[0]; 
                    
                    $('#nombre_usuario').val(data_ciudadano.nombre_completo)
                    $('#apellido_usuario').val(data_ciudadano.apellido_completo)
                    $('#correo_usuario').val(data_user.email)
                    $('#telefono_usuario').val(data_ciudadano.telefono)
                    $('#fecha_nacimiento').val(fechaNacimiento)
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

    

    
  
