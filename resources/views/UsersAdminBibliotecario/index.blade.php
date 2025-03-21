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
                'NOMBRE',
                'APELLDO',
                'ESPECIALIDAD',
                'MPPS',
                'CORREO',
                'SEXO',
                ['label' => 'Actions', 'no-export' => true, 'width' => 5],
            ];

            $btnEdit = '<button class="btn btn-xs btn-default text-primary  shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </button>';
            $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger  shadow" title="Delete">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>';
            $btnDetails = '<button class="btn btn-xs btn-default text-teal  shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </button>';

            $config = [
                
            ];
            @endphp

            {{-- Minimal example / fill data using the component slot --}}
            
            <x-adminlte-datatable id="table1" class="text text-center" :heads="$heads">
                @foreach($UsersRoles as $rol)
                    <tr>
                        <td>{{$rol->id}}</td>
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
                            
                            <form action="{{route('UsersAdminBibliotecario.destroy',$rol->id)}}" method="post" class="form_eliminater">
                                @csrf
                                @method('delete')
                                {!! $btnDelete !!}
                            </form>

                            <button class="btn btn-xs btn-default text-primary shadow btn-details" 
                                
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
    
@stop

    

    
  
