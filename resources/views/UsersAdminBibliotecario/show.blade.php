  <!-- Modal -->
  <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="showModalLabel">Información del usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" id="editForm"  enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="modal-body">
                <div class="sub-title">
                    <h6><strong>Más información del usuario: </strong></h6>
                    <hr>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="nombre_usuario_show" class="text-info">Nombre completo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="nombre_usuario_show" id="nombre_usuario_show" class="form-control" placeholder="Nombre completo" aria-label="Libro" aria-describedby="basic-addon1" value="{{ old('nombre_usuario_show') }}" readonly>
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('nombre_usuario_show') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3 d-block">
                        <label for="apellido_usuario_show" class="text-info">Apellido completo</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="apellido_usuario_show" id="apellido_usuario_show" class="form-control" placeholder="Apellido completo" aria-label="Autor del Libro" aria-describedby="basic-addon1" value="{{ old('apellido_usuario_show') }}" readonly>
                        </div>
                        {{-- <p>message error</p> --}}
                        @error('apellido_usuario_show') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="input-group mb-3 d-block">
                    <label for="correo_usuario_show" class="text-info">Correo electrónico</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" name="correo_usuario_show" id="correo_usuario_show" class="form-control" placeholder="correo@gmail.com" aria-label="Autor del Libro" aria-describedby="basic-addon1" value="{{ old('correo_usuario_show') }}" readonly>
                    </div>
                    {{-- <p>message error</p> --}}
                    @error('correo_usuario_show') {{-- indicamos el nombre del campo --}}
                        {{-- indicamos el mensaje de error  --}}
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="telefono_usuario_show" class="text-info">Teléfono</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="number" name="telefono_usuario_show" id="telefono_usuario_show" class="form-control" placeholder="00000000000" aria-label="Libro" aria-describedby="basic-addon1" value="{{ old('telefono_usuario_show') }}" readonly>
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('telefono_usuario_show') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block ">
                            <label for="fecha_nacimiento_show" class="text-info">Fecha de nacimiento</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="date" name="fecha_nacimiento_show" id="fecha_nacimiento_show" class="form-control" aria-label="Fecha de publicación" aria-describedby="basic-addon1" value="{{ old('fecha_nacimiento_show') }}" readonly>
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('fecha_nacimiento_show') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block ">
                            <label for="fecha_registro_show" class="text-info">Fecha de registro</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="date" name="fecha_registro_show" id="fecha_registro_show" class="form-control" aria-label="Fecha de publicación" aria-describedby="basic-addon1" value="{{ old('fecha_registro_show') }}" readonly>
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('fecha_registro_show') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    
                </div>
            </div>
            {{-- button  --}}
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </form>
      </div>
    </div>
  </div>
  
