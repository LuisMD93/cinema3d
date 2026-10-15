@extends('layouts.app')
@section('title','Moidificar Categoria')
@section('content')
   <h3 class="mt-4 mb-3">Registro Categorías</h3>

<form action="{{ route('category.update',$dataCategory->id) }}" method="POST" id="form">

    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-4">

            <input
                type="text"
                name="name_category"
                class="form-control"
                placeholder="Ingrese nombre de la categoria....."
                value="{{ old('name_category',$dataCategory->name_category) }}"
            >

            @error('name_category')
                <div class="error compacto col-lg-5">
                    {{ $message }}
                </div>
            @enderror

        </div>
    </div>
    <br>
    <div class="row">

        <div class="col-md-4">

            <input
                type="text"
                name="description"
                class="form-control"
                placeholder="Ingrese descripción  de la categoria....."
                value="{{ old('description',$dataCategory->description) }}"
            >

            @error('description')
                <div class="error compacto col-lg-5">
                    {{ $message }}
                </div>
            @enderror

        </div>

    </div>

    <br>

    <button type="submit" class="btn btn-success">
        Guardar
    </button>

    <a href="{{ url('category') }}" class="btn btn-secondary">
        Cancelar
    </a>

</form>


@stop()
@section('js')
    <script src="{{url('js/jquery.validate.min.js')}}"></script>
    <script src="{{url('js/localilization/messages_es.min.js')}}"></script>

    <script>
        $("#form").validate({
            rules: {
                category: {
                    required: true,
                    maxlength: 50
                },
                description: {
                    required: true,
                    maxlength: 150
                }
            }
        });
    </script>
@stop()