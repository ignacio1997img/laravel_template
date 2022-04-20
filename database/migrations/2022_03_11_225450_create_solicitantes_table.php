<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitantes', function (Blueprint $table) {
            $table->id();
            $table->string('nit');
            $table->string('nombre');
            $table->text('direccion')->nullable();
            $table->text('referencia')->nullable();
            $table->string('contacto')->nullable();
            $table->string('tel')->nullable();
            $table->datetime('fecha')->nullable();
            $table->smallInteger('tipocontrato');
            $table->smallInteger('requisito');
            $table->string('usuariosolicitante')->nullable();



            //inspeccion previa
            $table->text('inspector')->nullable();
            $table->text('residuo')->nullable();
            $table->text('lugar')->nullable();
            $table->text('estado')->nullable();
            $table->text('observacion')->nullable();//opcional por si las dudas
            $table->datetime('fechainspeccion')->nullable();
            $table->string('usuarioinspeccion')->nullable();



            //costo
            // $table->string('tipo')->nullable();
            $table->decimal('contrato',11, 2)->nullable();
            $table->datetime('fechacosto')->nullable();
            $table->string('usuariocosto')->nullable();

            //programacion de la atencion
            // $table->string('tipo')->nullable();
            $table->text('obs')->nullable();

            $table->string('frecuencia')->nullable();
            $table->string('turno')->nullable();
            // $table->string('frecuencia')->nullable();
            $table->datetime('fechaprogramacion')->nullable();
            $table->string('usuarioprogramacion')->nullable();



            $table->smallInteger('status');
            $table->timestamps();
            $table->foreignId('deleteuser_id')->nullable()->constrained('users');
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitantes');
    }
}
