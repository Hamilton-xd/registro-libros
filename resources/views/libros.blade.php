<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro y Listado de Libros</title>
    <!-- Bootstrap CSS para dar diseño limpio -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2 class="text-center mb-4">Gestión de Biblioteca - UGB</h2>

        <!-- Mensaje de éxito -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Errores de validación -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <!-- Formulario de Registro -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3">
                    <h4>Registrar Libro</h4>
                    <form action="{{ route('libros.store') }}" method="POST">
                        @csrf <!-- Token obligatorio de seguridad -->

                        <div class="mb-3">
                            <label class="form-label">Título:</label>
                            <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Autor:</label>
                            <input type="text" name="autor" class="form-control" value="{{ old('autor') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Año de publicación (4 dígitos):</label>
                            <input type="number" name="anio_publicacion" class="form-control" min="1000" max="9999" value="{{ old('anio_publicacion') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Guardar Libro</button>
                    </form>
                </div>
            </div>

            <!-- Tabla de Listado Automático -->
            <div class="col-md-8">
                <div class="card shadow-sm p-3">
                    <h4>Libros Registrados</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th>Año</th>
                                    <th>Registrado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Bucle Blade para recorrer todos los libros de la base de datos -->
                                @forelse($libros as $libro)
                                    <tr>
                                        <td>{{ $libro->id }}</td>
                                        <td>{{ $libro->titulo }}</td>
                                        <td>{{ $libro->autor }}</td>
                                        <td>{{ $libro->anio_publicacion }}</td>
                                        <td>{{ $libro->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No hay libros registrados aún.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>