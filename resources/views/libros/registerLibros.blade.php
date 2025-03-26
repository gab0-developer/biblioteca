<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal-modal-xl">
    Registrar Libro    
</button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal-modal-xl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo Libro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('libros.store')}}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="sub-title">
                    <h6><strong>Ingresar datos del libro</strong></h6>
                    <hr>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3" style="display:none">
                        <input type="text" name="rol_lector" class="form-control" placeholder="rol_lector" aria-label="rol_lector" aria-describedby="basic-addon1" value="3" style="display:none" hidden>
                    </div>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="titulo_libro" class="text-info">Título del Libro</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-book"></i></span>
                                </div>
                                <input type="text" name="titulo_libro" class="form-control" placeholder="Libro" aria-label="Libro" aria-describedby="basic-addon1" value="{{ old('titulo_libro') }}">
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('titulo_libro') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3 d-block">
                        <label for="autor_libro" class="text-info">Autor del Libro</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="autor_libro" class="form-control" placeholder="Autor del Libro" aria-label="Autor del Libro" aria-describedby="basic-addon1" value="{{ old('autor_libro') }}">
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
                            <label for="editorial_libro" class="text-info">Editoriar del Libro</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-book"></i></span>
                                </div>
                                <input type="text" name="editorial_libro" class="form-control" placeholder="Editorial del libro" aria-label="Libro" aria-describedby="basic-addon1" value="{{ old('editorial_libro') }}">
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('editorial_libro') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="categoria_libro" class="text-info">Ingresar Categoria</label>
                            <div class="form-group w-100 d-flex">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-book"></i></span>
                                </div>
                                <select class="form-control form-select " name="categoria_libro" id="sexo" value="{{ old('categoria_libro') }}">
                                    <option readonly >Seleccionar categoría</option>
                                    @foreach ($categorias as $categoria)
                                        <option value={{$categoria->id}}>{{$categoria->nombre_categoria}}</option>
                                    @endforeach
                                </select>
                                {{-- <p>message error</p> --}}
                                @error('categoria_libro') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="cantidad_libro" class="text-info">Cantidad de libros</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-book"></i></span>
                                </div>
                                <input type="number" name="cantidad_libro" class="form-control" placeholder="Cantidad de libro" aria-label="Libro" aria-describedby="basic-addon1" value="{{ old('cantidad_libro') }}">
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('cantidad_libro') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block ">
                            <label for="fecha_publicacion" class="text-info">Fecha de publicación</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="date" name="fecha_publicacion" class="form-control" aria-label="Fecha de publicación" aria-describedby="basic-addon1" value="{{ old('fecha_publicacion') }}">
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('fecha_publicacion') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="portada_libro" class="text-info">Portada de libros</label>
                            <div class="input-group d-flex">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-image"></i></span>
                                </div>
                                <input type="file" name="portada_libro" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/*">
                                <label class="custom-file-label" for="inputGroupFile01">Subir imagen</label>
                            </div>
                            @error('portada_libro')
                                <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </div>
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
  
