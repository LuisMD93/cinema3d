@extends('layouts.app')
@section('title', 'Modificar Información Personal')
@section('content')

    <h3 class="mt-4 mb-3">Modificar Información Personal</h3>

    <form action="{{ route('person.update', $person->id) }}" method="POST" id="form">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- Nombres -->
            <div class="col-md-6 mb-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input
                    type="text"
                    name="nombres"
                    id="nombres"
                    class="form-control"
                    placeholder="Ingrese nombres..."
                    value="{{ old('nombres', $person->nombres) }}"
                >
                @error('nombres')
                    <div class="error compacto col-lg-5 text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Apellidos -->
            <div class="col-md-6 mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input
                    type="text"
                    name="apellidos"
                    id="apellidos"
                    class="form-control"
                    placeholder="Ingrese apellidos..."
                    value="{{ old('apellidos', $person->apellidos) }}"
                >
                @error('apellidos')
                    <div class="error compacto col-lg-5 text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row">
            <!-- Fecha de nacimiento -->
            <div class="col-md-6 mb-3">
                <label for="fecha_nacimient" class="form-label">Fecha de nacimiento</label>
                <input
                    type="date"
                    name="fecha_nacimient"
                    id="fechaNacimiento"
                    class="form-control"
                    value="{{ old('fecha_nacimient', $person->fecha_nacimient) }}"
                >
                @error('fechaNacimiento')
                    <div class="error compacto col-lg-5 text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Cantidad de niños -->
            <div class="col-md-6 mb-3">
                <label for="ninos" class="form-label">Cantidad de niños a cargo</label>
                <input
                    type="number"
                    name="ninos"
                    id="ninos"
                    class="form-control"
                    min="0"
                    value="{{ old('ninos', $person->ninos) }}"
                >
                @error('ninos')
                    <div class="error compacto col-lg-5 text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="row">
            <!-- Madre cabeza de familia -->
            <div class="col-md-6 mb-3">
                <label class="form-label d-block">¿Es madre cabeza de familia?</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="madre_cabeza" id="madreSi" value="Si" {{ old('madreCabeza', $person->madre_cabeza) == 'Si' ? 'checked' : '' }}>
                    <label class="form-check-label" for="madreSi">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="madre_cabeza" id="madreNo" value="No" {{ old('madreCabeza', $person->madre_cabeza) == 'No' ? 'checked' : '' }}>
                    <label class="form-check-label" for="madreNo">No</label>
                </div>
                @error('madreCabeza')
                    <div class="error compacto col-lg-5 text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Estudio técnico o tecnólogo -->
            <div class="col-md-6 mb-3">
                <label class="form-label d-block">¿Está realizando un técnico o tecnólogo?</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="estudio" id="estudioSi" value="Si" {{ old('estudio', $person->estudio) == 'Si' ? 'checked' : '' }}>
                    <label class="form-check-label" for="estudioSi">Sí</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="estudio" id="estudioNo" value="No" {{ old('estudio', $person->estudio) == 'No' ? 'checked' : '' }}>
                    <label class="form-check-label" for="estudioNo">No</label>
                </div>
                @error('estudio')
                    <div class="error compacto col-lg-5 text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <!-- Géneros de cine -->
        <div class="row mb-4">
            <div class="col-md-12">
                <label class="form-label d-block">Géneros de cine que prefiere:</label>
                @php
                    $generosSeleccionados = old('generos', $person->generos ?? []);
                @endphp
                <div class="row">
                    @foreach(['Acción', 'Comedia', 'Drama', 'Terror', 'Ciencia Ficción', 'Romance'] as $genero)
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="generos[]" value="{{ $genero }}" id="gen_{{ Str::slug($genero) }}" {{ in_array($genero, $generosSeleccionados) ? 'checked' : '' }}>
                                <label class="form-check-label" for="gen_{{ Str::slug($genero) }}">{{ $genero }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
                @error('generos')
                    <div class="error compacto col-lg-5 text-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <br>

        <button type="submit" class="btn btn-success">
            Guardar Cambios
        </button>

        <a href="{{ url('person') }}" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

@stop()

@section('js')
    <script src="{{ url('js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('js/localilization/messages_es.min.js') }}"></script>

    <script>
        $("#form").validate({
            rules: {
                nombres: {
                    required: true,
                    maxlength: 255
                },
                apellidos: {
                    required: true,
                    maxlength: 255
                },
                fechaNacimiento: {
                    required: true,
                    date: true
                },
                ninos: {
                    required: true,
                    digits: true,
                    min: 0
                },
                madreCabeza: {
                    required: true
                },
                estudio: {
                    required: true
                }
            }
        });
    </script>
@stop()