<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestor de Proyectos</title>
    @if (session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 12px; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 20px;">
        <strong>¡Logrado!</strong> {{ session('success') }}
    </div>
@endif

<form action="/projects" method="POST" ...>
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
                <div style="margin-bottom: 20px;">
                    <label class="block font-bold mb-2">
                        Estado
                    </label>

                    <select name="status" class="w-full border rounded p-2">
                        <option value="pendiente">Pendiente</option>
                        <option value="en_progreso">En Progreso</option>
                        <option value="completado">Completado</option>
                    </select>
                </div>  
                <button
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800" 
                >
                    Guardar Proyecto
                </button>    
            </form>

            <hr style="margin: 30px 0;">

               <div style="background-color: #e2e8f0; padding: 10px 15px; border-radius: 5px; margin-bottom: 15px; display: inline-block;">
                    <strong style="color: #4a5568;">Total proyectos:</strong> 
                    <span style="background-color: #4a5568; color: white; padding: 2px 8px; border-radius: 50px; font-size: 14px;">
                     {{ $projects->count() }}
                    </span>
                </div>

            <h2>Mis Proyectos</h2>
        <ul>
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

        <p class="text-gray-600 mb-3">
            {{ $project->description }}
        </p>

        <div class="flex gap-2">

            <!-- Botón editar -->
            <a
                href="/projects/{{ $project->id }}/edit"
                class="bg-yellow-500 hover:bg-yellow-700 text-white px-3 py-1 rounded"
            >
                Editar
            </a>

            <!-- Botón eliminar -->
            <form
                action="/projects/{{ $project->id }}"
                method="POST"
            >

                @csrf

                @method('DELETE')

                <button
                    class="bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded"
                    onclick="return confirm('¿Eliminar proyecto?')"
                >
                    Eliminar
                </button>

            </form>

        </div>

    </div>

@empty

                <p>No hay proyectos todavía.</p>

            @endforelse

        </div>

    </div>

</body>
</html>