<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Proyectos</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="max-w-4xl mx-auto mt-10">

        <h1 class="text-4xl font-bold mb-6">
            Gestor de Proyectos
        </h1>

        <!-- Formulario -->
        <div class="bg-white p-6 rounded shadow mb-8">

            <form action="/projects" method="POST">

                @csrf

                <div class="mb-4">
                    <label class="block font-bold mb-2">
                        Nombre del Proyecto
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="w-full border rounded p-2"
                        placeholder="Ej: Sistema de Ventas"
                    >
                    @error('name')
                        <p style="color: red; margin: 5px 0 0 0; font-size: 14px;">
                            {{ $message }}
                        </p>
                    @enderror   
                </div>

                <div class="mb-4">
                    <label class="block font-bold mb-2">
                        Descripción
                    </label>

                    <textarea
                        name="description"
                        class="w-full border rounded p-2"
                        rows="4"
                    ></textarea>
                </div>

                <button
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800" 
                >
                    Guardar Proyecto
                </button>

            </form>
        </div>

        <!-- Lista de proyectos -->
        <div class="bg-white p-6 rounded shadow">

            <h2 class="text-2xl font-bold mb-4">
                Proyectos
            </h2>

            @forelse($projects as $project)

                <div class="border-b py-4">

                    <h3 class="text-xl font-bold">
                        {{ $project->name }}
                    </h3>

                    <p class="text-gray-600">
                        {{ $project->description }}
                    </p>

                    <h3 class="text-sm text-gray-500 mt-2">
                        Creado el {{ $project->created_at->format('d/m/Y') }}
                    </h3>

                </div>

            @empty

                <p>No hay proyectos todavía.</p>

            @endforelse

        </div>

    </div>

</body>
</html>