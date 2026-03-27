<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{   
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('especie');
            $table->string('raza')->nullable();
            $table->integer('edad'); // en años humanos
            $table->enum('sexo', ['macho', 'hembra', 'desconocido']);
            $table->decimal('peso', 5, 2); // hasta 200.00 kg
            $table->date('fecha_nacimiento')->nullable();
            $table->string('chip')->nullable()->unique();
            $table->boolean('esterilizado')->default(false);
            $table->boolean('vacunado')->default(false);
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
