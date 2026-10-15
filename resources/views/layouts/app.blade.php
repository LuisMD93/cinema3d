<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')

    <title>@yield('title')</title>
</head>
<body>

<div class="container mt-4">

    <div class="d-flex align-items-center justify-content-between mb-4 border-bottom pb-3">

        <h3 class="m-0 text-primary">Cinema 3D</h3>

        <div>
            <a href="{{ url('/') }}" class="btn btn-outline-primary me-2">
                Inicio
            </a>

            <a href="{{ url('/person') }}" class="btn btn-primary">
                Personas
            </a>
        </div>

    </div>

    @yield('content')

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="..."
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script> 
    @yield('js')

</body>
</html>