<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cliente</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-500">
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h1 class="text-2xl font-semibold mb-4">Crear Cliente</h1>
            <form action="{{ route('client-create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre:</label>
                        <input value="{{ old('name') }}" name="name" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 " type="text" />
                        @if ($errors->has('name'))
                            <p class="text-red-500 text-xs italic mt-1">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Apellido:</label>
                        <input name="last_name" value="{{ old('last_name') }}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600" type="text" />
                        @if ($errors->has('last_name'))
                            <p class="text-red-500 text-xs italic mt-1">{{ $errors->first('last_name') }}</p>
                        @endif
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Cedula:</label>
                        <input name="identification" value="{{ old('identification') }}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 " type="number" />
                        @if ($errors->has('identification'))
                            <p class="text-red-500 text-xs italic mt-1">{{ $errors->first('identification') }}</p>
                        @endif
                    </div>
                    <!-- Departamento -->
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Departamento:</label>
                        <select name="departament" id="departament" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 ">
                            <option value="">Seleccionar Departamento</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department['name'] }}" data-id="{{ $department['id'] }}">{{ $department['name'] }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('departament'))
                            <p class="text-red-500 text-xs italic mt-1">{{ $errors->first('departament') }}</p>
                        @endif
                    </div>
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Celular:</label>
                        <input name="phone" value="{{ old('phone') }}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 " type="number" />
                        @if ($errors->has('phone'))
                            <p class="text-red-500 text-xs italic mt-1">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>
                    <!-- Ciudad -->
                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Ciudad:</label>
                        <select name="city" id="city" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 ">
                            <option value="">Seleccionar Ciudad</option>
                        </select>
                        @if ($errors->has('city'))
                            <p class="text-red-500 text-xs italic mt-1">{{ $errors->first('city') }}</p>
                        @endif
                    </div>

                    <div class="grid grid-cols-1">
                        <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">correo:</label>
                        <input name="email" value="{{ old('email') }}" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 " type="email" />
                        @if ($errors->has('email'))
                            <p class="text-red-500 text-xs italic mt-1">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Tratamiento de datos:</label>
                    <div class="flex items-center mt-1">
                        <input name="accept_data_processing" id="accept_data_processing" class="form-checkbox h-5 w-5 text-purple-600 focus:ring-purple-500 border-gray-300 rounded" type="checkbox" value="1">
                        <label for="accept_data_processing" class="ml-2 block text-sm text-gray-900">Autorizo el tratamiento de mis datos de acuerdo con la
                            finalidad establecida en la política de protección de datos personales.</label>
                    </div>
                    @if ($errors->has('accept_data_processing'))
                        <p class="text-red-500 text-xs italic mt-1">{{ $errors->first('accept_data_processing') }}</p>
                    @endif
                </div>

                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    <a href="{{ route('home') }}" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Cancelar</a>
                    <button type="submit" style="background:blue;" class='w-auto rounded-lg shadow-xl font-medium text-white px-4 py-2'>Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script>
    document.getElementById('departament').addEventListener('change', function() {
        const departmentId = this.options[this.selectedIndex].getAttribute('data-id');
        fetch(` https://api-colombia.com/api/v1/Department/${departmentId}/cities`)
            .then(response => response.json())
            .then(data => {
                const citySelect = document.getElementById('city');
                citySelect.innerHTML = '<option value="">Seleccionar Ciudad</option>';
                data.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city.name;
                    option.textContent = city.name;
                    citySelect.appendChild(option);
                });
            });
    });
</script>
