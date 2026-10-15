@extends('layouts.app')
@section('title','Registro de información personal')
@section('content')

<div class="container py-5">
    <!-- row crea una fila del sistema de rejilla; justify-content-center centra sus columnas horizontalmente. -->
    <div class="row justify-content-center">
        <!-- col-lg-8 ocupa 8 de 12 columnas desde el punto de quiebre lg -->
        <div class="col-lg-8">
            <!--- Título y Subtítulo -->
            <h1 class="page-title text-center mb-3">Registro de información personal</h1>
            <p class="page-subtitle text-center mb-5">
                Interfaz clara y confiable, inspirada en la identidad visual
                del sector financiero.
            </p>
            <div class="card finance-card">
                <div class="card-body p-4">
                    <!-- Formulario adaptado a Laravel -->
                    <form action="{{ route('person.store') }}" method="POST" id="formularioBootstrap">
                        @csrf
                        
                        <!-- Nombres -->
                        <div class="mb-3">
                            <label for="nombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres') }}" required>
                            @error('nombres')
                                <div class="error compacto col-lg-5 text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Apellidos -->
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required>
                            @error('apellidos')
                                <div class="error compacto col-lg-5 text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Fecha de nacimiento -->
                        <div class="mb-3">
                            <label for="fecha_nacimient" class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimient" name="fecha_nacimient" value="{{ old('fecha_nacimient') }}" required>
                            @error('fechaNacimiento')
                                <div class="error compacto col-lg-5 text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Cantidad de niños a cargo -->
                        <div class="mb-3">
                            <label for="ninos" class="form-label">Cantidad de niños a cargo</label>
                            <input type="number" class="form-control" id="ninos" name="ninos" min="0" value="{{ old('ninos', '0') }}" required>
                            @error('ninos')
                                <div class="error compacto col-lg-5 text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Madre cabeza de familia -->
                        <div class="mb-3">
                            <label class="form-label d-block">¿Es madre cabeza de familia?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="madre_cabeza" id="madreSi" value="Si" {{ old('madreCabeza') == 'Si' ? 'checked' : '' }}>
                                <label class="form-check-label" for="madreSi">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="madre_cabeza" id="madreNo" value="No" {{ old('madreCabeza', 'No') == 'No' ? 'checked' : '' }}>
                                <label class="form-check-label" for="madreNo">No</label>
                            </div>
                            @error('madreCabeza')
                                <div class="error compacto col-lg-5 text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Técnico o Tecnólogo -->
                        <div class="mb-3">
                            <label class="form-label d-block">¿Está realizando un técnico o tecnólogo?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="estudio" id="estudioSi" value="Si" {{ old('estudio') == 'Si' ? 'checked' : '' }}>
                                <label class="form-check-label" for="estudioSi">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="estudio" id="estudioNo" value="No" {{ old('estudio', 'No') == 'No' ? 'checked' : '' }}>
                                <label class="form-check-label" for="estudioNo">No</label>
                            </div>
                            @error('estudio')
                                <div class="error compacto col-lg-5 text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Géneros de cine -->
                        <div class="mb-4">
                            <label class="form-label d-block">Géneros de cine que prefiere:</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="generos[]" value="Acción" id="accion" {{ is_array(old('generos')) && in_array('Acción', old('generos')) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="accion">Acción</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="generos[]" value="Comedia" id="comedia" {{ is_array(old('generos')) && in_array('Comedia', old('generos')) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="comedia">Comedia</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="generos[]" value="Drama" id="drama" {{ is_array(old('generos')) && in_array('Drama', old('generos')) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="drama">Drama</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="generos[]" value="Terror" id="terror" {{ is_array(old('generos')) && in_array('Terror', old('generos')) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="terror">Terror</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="generos[]" value="Ciencia Ficción" id="scifi" {{ is_array(old('generos')) && in_array('Ciencia Ficción', old('generos')) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="scifi">Ciencia Ficción</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="generos[]" value="Romance" id="romance" {{ is_array(old('generos')) && in_array('Romance', old('generos')) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="romance">Romance</label>
                                    </div>
                                </div>
                            </div>
                            @error('generos')
                                <div class="error compacto col-lg-5 text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Botones de Envío y Cancelar -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary btn-lg flex-grow-1">
                                Enviar y mostrar respuestas
                            </button>
                            <a href="{{ url('person') }}" class="btn btn-secondary btn-lg">
                                Cancelar
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop()
