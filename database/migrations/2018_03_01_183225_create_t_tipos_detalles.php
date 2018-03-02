<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTTiposDetalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiposdetalles', function (Blueprint $table) {
            $table->increments('id');
            
            
            $table->unsignedInteger('tipos_id')->default(1);
            $table->foreign('tipos_id')->references('id')->on('tipos');
            $table->string('nombre_detalle_tipo',50);
            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');


            $table->timestamps();
        });

        // Insertando Registros en la Tabla.
        DB::table('tiposdetalles')->insert([
            ['tipos_id' => 1,'nombre_detalle_tipo' => 'Terreno','estados_id' => 1],
            ['tipos_id' => 1,'nombre_detalle_tipo' => 'Hotel/Motel','estados_id' => 1],
            ['tipos_id' => 1,'nombre_detalle_tipo' => 'Casa','estados_id' => 1],
            ['tipos_id' => 1,'nombre_detalle_tipo' => 'Departamento','estados_id' => 1],
            ['tipos_id' => 1,'nombre_detalle_tipo' => 'Duplex','estados_id' => 1],
            ['tipos_id' => 1,'nombre_detalle_tipo' => 'Triplex','estados_id' => 1],
            ['tipos_id' => 1,'nombre_detalle_tipo' => 'Fourplex','estados_id' => 1],
            ['tipos_id' => 1,'nombre_detalle_tipo' => 'Casa Jardin','estados_id' => 1],
            ['tipos_id' => 1,'nombre_detalle_tipo' => 'Casa Movil','estados_id' => 1],
            ['tipos_id' => 1,'nombre_detalle_tipo' => 'Compartido','estados_id' => 1],
            ['tipos_id' => 1,'nombre_detalle_tipo' => 'Soltero','estados_id' => 1],
            ['tipos_id' => 1,'nombre_detalle_tipo' => 'Residencial Comercial','estados_id' => 1],

            ['tipos_id' => 2,'nombre_detalle_tipo' => 'Oficinas','estados_id' => 1],
            ['tipos_id' => 2,'nombre_detalle_tipo' => 'Negocios','estados_id' => 1],
            ['tipos_id' => 2,'nombre_detalle_tipo' => 'Minorista','estados_id' => 1],
            ['tipos_id' => 2,'nombre_detalle_tipo' => 'Industrial','estados_id' => 1],
            ['tipos_id' => 2,'nombre_detalle_tipo' => 'MultiFamiliar','estados_id' => 1],
            ['tipos_id' => 2,'nombre_detalle_tipo' => 'Terreno','estados_id' => 1],
            ['tipos_id' => 2,'nombre_detalle_tipo' => 'Almacen','estados_id' => 1],
            ['tipos_id' => 2,'nombre_detalle_tipo' => 'Otros','estados_id' => 1],
            
            ]);
    }

    public function down()
    {
        Schema::drop('tiposdetalles');
    }
}
