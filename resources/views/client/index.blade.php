<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="table-responsive-sm table-responsive-md">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="table-responsive-sm table-responsive-md">
                    <h2 class="text-3xl font-semibold mb-6">Clientes Registrados</h2>
                    <a type="button" href="{{ route('form-client') }}" style="float: right;" class="bg-indigo-600 px-12 py-2 rounded text-gray-200 font-semibold hover:bg-indigo-800 transition duration-200 each-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M7.5 1a6.5 6.5 0 1 0 0 13 6.5 6.5 0 0 0 0-13zM8 7V4h1v3h3v1H9v3H8V8H5V7h3z" />
                        </svg>
                    </a>
                    <div class="flex items-center">
                        <p class="mr-4">
                            <button onclick="objective(event, {{$clientWin}})"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded @if(count($clients) < 5) opacity-50 cursor-not-allowed @endif" @if(count($clients) < 5) disabled @endif>Revelar ganador</button>
                        </p>
                        <p>
                            <a href="{{route('clients.excel')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Exportar Archivo</a>
                        </p>
                    </div>



                    <table class="table table-dark table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Identidicacion</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Fecha De Creacion</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{$client->name}}</td>
                                <td>{{$client->last_name}}</td>
                                <td>{{$client->identification}}</td>
                                <td>{{$client->departament}}</td>
                                <td>{{$client->city}}</td>
                                <td>{{$client->phone}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{ $client->created_at->format('d/m/Y H:i:s') }}</td>
                            </tr>
                        @endforeach
                        {!! $clients->links() !!}
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function objective(event, clientWin) {
        event.preventDefault();
        Swal.fire({
            position: 'center',
            icon: "success",
            title: "¡Felicidades!",
            html: `
                <p>${clientWin.name} ${clientWin.last_name} has sido el ganador.</p>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Identificación:</th>
                            <td>${clientWin.identification}</td>
                        </tr>
                        <tr>
                            <th scope="row">Departamento:</th>
                            <td>${clientWin.departament}</td>
                        </tr>
                        <tr>
                            <th scope="row">Ciudad:</th>
                            <td>${clientWin.city}</td>
                        </tr>
                        <tr>
                            <th scope="row">Celular:</th>
                            <td>${clientWin.phone}</td>
                        </tr>
                        <tr>
                            <th scope="row">Correo:</th>
                            <td>${clientWin.email}</td>
                        </tr>
                        <tr>
                            <th scope="row">Fecha de Creación:</th>
                              <td>{{ \Carbon\Carbon::parse($clientWin?->created_at)->format('d/m/Y H:i:s') }}</td>
                        </tr>
                    </tbody>
                </table>
            `,
            confirmButtonText: 'Ok',
            showConfirmButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/";
            }
        });
    }
</script>

