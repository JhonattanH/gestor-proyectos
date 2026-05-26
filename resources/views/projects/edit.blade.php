<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Proyecto</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-3xl mx-auto mt-10">

    <div class="bg-white p-6 rounded shadow">

        <h1 class="text-3xl font-bold mb-6">
            Editar Proyecto
        </h1>

        <form
            action="/projects/{{ $project->id }}"
            method="POST"
        >

            @csrf

            @method('PUT')

            <div class="mb-4">

                <label class="block mb-2 font-bold">
                    Nombre
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ $project->name }}"
                    class="w-full border p-2 rounded"
                >

                @error('name')
                    <p class="text-red-500 mt-1">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <div class="mb-4">

                <label class="block mb-2 font-bold">
                    Descripción
                </label>

                <textarea
                    name="description"
                    rows="4"
                    class="w-full border p-2 rounded"
                >{{ $project->description }}</textarea>

            </div>

            <button
                class="bg-yellow-500 hover:bg-yellow-700 text-white px-4 py-2 rounded"
            >
                Actualizar
            </button>

            <a
                href="/projects"
                class="ml-2 text-gray-600"
            >
                Cancelar
            </a>

        </form>

    </div>

</div>

</body>
</html>