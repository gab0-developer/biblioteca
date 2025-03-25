  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Modificar usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" id="editForm"  enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="modal-body">
                <div class="sub-title">
                    <h6><strong>Datos del ciudadano: </strong></h6>
                    <hr>
                </div>
                {{-- <div class="container-inputs d-flex w-100">
                    <div class="input-group mb-3 mr-3 w-100">
                        <div class="input-group mb-3 d-block w-100">
                            <label for="selec2_permiso" class="text-info">Selecionar rol:</label>
                            <div class="input-group w-100">
                                <select class="js-example-basic-multiple w-100 form-control" id="select2_permiso" name="roles[]" multiple="multiple" ></select>
                                
                            </div>
                        </div>
                    </div>
                </div> --}}
                
                
                <div class="container-inputs d-flex">
                    
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="nombre_usuario" class="text-info">Nombre completo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" placeholder="Nombre completo" aria-label="Libro" aria-describedby="basic-addon1" value="{{ old('nombre_usuario') }}" readonly>
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
                            <input type="text" name="apellido_usuario" id="apellido_usuario" class="form-control" placeholder="Apellido completo" aria-label="Autor del Libro" aria-describedby="basic-addon1" value="{{ old('apellido_usuario') }}" readonly>
                        </div>
                        {{-- <p>message error</p> --}}
                        @error('apellido_usuario') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="telefono_usuario" class="text-info">Teléfono</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="number" name="telefono_usuario" id="telefono_usuario" class="form-control" placeholder="00000000000" aria-label="telefono" aria-describedby="basic-addon1" value="{{ old('telefono_usuario') }}" readonly>
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
                            <label for="fecha_regsitro_solicitud" class="text-info">Fecha de regsitro</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="date" name="fecha_regsitro_solicitud" id="fecha_regsitro_solicitud" class="form-control" aria-label="Fecha de publicación" aria-describedby="basic-addon1" value="{{ old('fecha_regsitro_solicitud') }}" readonly>
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('fecha_regsitro_solicitud') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    
                </div>
                
                <hr>
                <div class="sub-title">
                    <h6><strong>Libro solicitado: </strong></h6>
                    <hr>
                </div>
                <div class="container-inputs d-flex">
                    
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="titulo_libro" class="text-info">Título del libro:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="titulo_libro" id="titulo_libro" class="form-control" placeholder="Nombre completo" aria-label="Libro" aria-describedby="basic-addon1" value="{{ old('titulo_libro') }}" readonly>
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('titulo_libro') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="input-group mb-3 d-block">
                        <label for="autor_libro" class="text-info">Autor del libro</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="autor_libro" id="autor_libro" class="form-control" placeholder="Apellido completo" aria-label="Autor del Libro" aria-describedby="basic-addon1" value="{{ old('autor_libro') }}" readonly>
                        </div>
                        {{-- <p>message error</p> --}}
                        @error('autor_libro') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="container-inputs d-flex">
                    
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="categoria_libro" class="text-info">Categoría del libro:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="categoria_libro" id="categoria_libro" class="form-control" placeholder="Nombre completo" aria-label="Libro" aria-describedby="basic-addon1" value="{{ old('categoria_libro') }}" readonly>
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('categoria_libro') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="input-group mb-3 d-block">
                        <label for="estatus" class="text-success">Seleccionar estatus:</label>
                        <div class="form-group w-100 d-flex">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-book"></i></span>
                            </div>
                            <select class="form-control form-select" name="estatus" id="estatus">
                                @foreach ($estatusID as $estatu)
                                    <option value={{$estatu->id}}>{{$estatu->estatu}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            {{-- button  --}}
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-success">Guardar cambios</button>
            </div>

        </form>
      </div>
    </div>
  </div>
  
