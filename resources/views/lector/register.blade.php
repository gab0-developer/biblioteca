
    
<div class="container">
    <div class="card p-3">
        <div class="title-form bg-success">
            <center>
                <h4>Registrarse</h4>
            </center>
        </div>
        <form action="{{route('lector.store')}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="sub-title">
                    <h6 class="text-success"><strong>Por favor ingrese los datos solicitados</strong></h6>
                    <hr>
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3" style="display:none">
                        <input type="text" name="rol_lector" class="form-control" placeholder="rol_lector" aria-label="rol_lector" aria-describedby="basic-addon1" value="3" style="display:none" hidden>
                    </div>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="nombre_lector" class="text-info">Nombre completo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="nombre_lector" class="form-control" placeholder="Nombre completo" aria-label="Libro" aria-describedby="basic-addon1" value="{{ old('nombre_lector') }}">
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('nombre_lector') {{-- indicamos el nombre del campo --}}
                                {{-- indicamos el mensaje de error  --}}
                                <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3 d-block">
                        <label for="apellido_lector" class="text-info">Apellido completo</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="apellido_lector" class="form-control" placeholder="Apellido completo" aria-label="Autor del Libro" aria-describedby="basic-addon1" value="{{ old('apellido_lector') }}">
                        </div>
                        {{-- <p>message error</p> --}}
                        @error('apellido_lector') {{-- indicamos el nombre del campo --}}
                            {{-- indicamos el mensaje de error  --}}
                            <p style="color:red;">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="input-group mb-3 d-block">
                    <label for="correo_lector" class="text-info">Correo electrónico</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" name="correo_lector" class="form-control" placeholder="correo@gmail.com" aria-label="Autor del Libro" aria-describedby="basic-addon1" value="{{ old('correo_lector') }}">
                    </div>
                    {{-- <p>message error</p> --}}
                    @error('correo_lector') {{-- indicamos el nombre del campo --}}
                        {{-- indicamos el mensaje de error  --}}
                        <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="container-inputs d-flex">
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group mb-3 d-block">
                            <label for="telefono_lector" class="text-info">Teléfono</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="number" name="telefono_lector" class="form-control" placeholder="00000000000" aria-label="Libro" aria-describedby="basic-addon1" value="{{ old('telefono_lector') }}">
                            </div>
                            {{-- <p>message error</p> --}}
                            @error('telefono_lector') {{-- indicamos el nombre del campo --}}
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
            <div class="btn-submit btn-success w-100">
                <input type="submit" name="submit_lector" class="btn btn-primary w-100" value="Registrarse">
            </div>
        
        </form>

        <div class="w-100 d-flex justify-content-center ">
            <p>¿Ya tienes una cuenta?</p> 
            <a href="{{route('login')}}" class="pl-1 text-success">Iniciar Sesión</a>
        </div>
    </div>
   
</div>





