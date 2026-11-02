<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Creamos la tabla 'libros' en la base de datos MySQL
        Schema::create('libros', function (Blueprint $table) {
            $table->id(); // ID único autoincremental
            $table->string('titulo'); // Campo de texto para el título
            $table->string('autor'); // Campo de texto para el autor
            $table->integer('anio_publicacion'); // Campo numérico de 4 dígitos para el año
            $table->timestamps(); // Columnas de creación y actualización
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};