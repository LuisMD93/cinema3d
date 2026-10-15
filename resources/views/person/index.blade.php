@extends('layouts.app')
@section('title','Personas')
@section('content')

      <h3 class="mt-4">Listado de Personas</h3>
      <div class="text-end">
           <a href="{{ route('person.create') }}" class="btn btn-primary">Nuevo</a>
      </div>
      <br>

      @if(session('type'))
      <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
            <strong>Noticia : </strong>{{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
      </div>
      <br>
      @endif

      <div class="card shadow-sm mt-4">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Listado de Registros Personales</h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Nombres y Apellidos</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Niños a Cargo</th>
                        <th>Madre Cabeza</th>
                        <th>Estudio</th>
                        <th>Géneros de Cine</th>
                        <th width="15%">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($personList as $person)
                        <tr>
                            <td>{{ $person->nombres }} {{ $person->apellidos }}</td>
                            <td class="text-center">{{ $person->fecha_nacimient->format('Y-m-d') }}</td>
                            <td class="text-center">{{ $person->ninos }}</td>
                            <td class="text-center">
                                <span class="badge {{ $person->madre_cabeza == 'Si' ? 'bg-info text-dark' : 'bg-secondary' }}">
                                    {{ $person->madre_cabeza }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="badge {{ $person->estudio == 'Si' ? 'bg-info text-dark' : 'bg-secondary' }}">
                                    {{ $person->estudio }}
                                </span>
                            </td>
                            <td>
                                @if(is_array($person->generos))
                                    {{ implode(', ', $person->generos) }}
                                @else
                                    {{ $person->generos }}
                                @endif
                            </td>
                           {{-- <b>{{ $person->id}}</b> --}}
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">

                                    <!-- Editar -->
                                    <a href="{{ route('person.edit', $person->id) }}"
                                       class="btn btn-warning btn-sm"
                                       title="Editar">
                                        ✏️
                                    </a>

                                    <!-- Eliminar -->
                                    <form action="{{ route('person.destroy', $person->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('¿Quiere eliminar el registro?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                title="Eliminar">
                                            🗑️
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                No existen personas registradas
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


@stop()