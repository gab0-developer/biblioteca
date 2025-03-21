<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-modal-xl">
    Registrar usuario    
</button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal-modal-xl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('UsersAdminBibliotecario.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="sub-title">
                    <h6 class="text-success"><strong>Por favor ingrese los datos solicitados</strong></h6>
                    <hr>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="rol_usuario" class="text-info">Privilegio a registrar</label>
                            <div class="form-group w-100 d-flex">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-book"></i></span>
                                </div>
                                <select class="form-control form-select " name="rol_usuario" id="sexo" value="{{ old('rol_usuario') }}">
                                    <option readonly >Seleccionar Rol</option>
                                    @foreach ($roles as $rol)
                                        <option value={{$rol->id}}>{{$rol->name}}</option>
                                    @endforeach
                                </select>
                                {{-- <p>message error</p> --}}
                                @error('rol_usuario') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="nombre_usuario" class="text-info">Nombre completo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="nombre_usuario" class="form-control" placeholder="Nombre completo" aria-label="Libro" aria-describedby="basic-addon1" value="{{ old('nombre_usuario') }}">
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('nombre_usuario') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3 d-block">
                        <label for="apellido_usuario" class="text-info">Apellido completo</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="apellido_usuario" class="form-control" placeholder="Apellido completo" aria-label="Autor del Libro" aria-describedby="basic-addon1" value="{{ old('apellido_usuario') }}">
                        </div>
                        {{-- <p>message error</p> --}}
                        @error('apellido_usuario') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="input-group mb-3 d-block">
                    <label for="correo_usuario" class="text-info">Correo electrónico</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" name="correo_usuario" class="form-control" placeholder="correo@gmail.com" aria-label="Autor del Libro" aria-describedby="basic-addon1" value="{{ old('correo_usuario') }}">
                    </div>
                    {{-- <p>message error</p> --}}
                    @error('correo_usuario') {{-- indicamos el nombre del campo --}}
                        {{-- indicamos el mensaje de error  --}}
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="telefono_usuario" class="text-info">Teléfono</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="number" name="telefono_usuario" class="form-control" placeholder="00000000000" aria-label="Libro" aria-describedby="basic-addon1" value="{{ old('telefono_usuario') }}">
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('telefono_usuario') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block ">
                            <label for="fecha_nacimiento" class="text-info">Fecha de nacimiento</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="date" name="fecha_nacimiento" class="form-control" aria-label="Fecha de publicación" aria-describedby="basic-addon1" value="{{ old('fecha_nacimiento') }}">
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('fecha_nacimiento') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    
                </div>
                
                <div class="sub-title">
                    <h6><strong>Ingresar su contraseña</strong></h6>
                    <hr>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control"  aria-label="contraseña paciente" aria-describedby="basic-addon1" value="{{ old('password') }}">
                        </div>
                        @error('password') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="input-group mb-3 mr-2">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-unlock-alt"></i></span>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control"  aria-label="contraseña paciente" aria-describedby="basic-addon1" value="{{ old('password_confirmation') }}">
                        </div>
                        @error('password') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                    
                </div>

            </div>
            {{-- button  --}}
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-success">Agregar libro</button>
            </div>

        </form>
      </div>
    </div>
  </div>
  

  





