<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('settings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('language', 3);
            $table->string('color', 10);
            $table->string('ph_name', 500);
            $table->string('ph_address', 500);
            $table->string('ph_telephone', 20);
            $table->string('ph_email', 30);
            $table->string('ph_fax', 20);
            $table->string('ph_print', 1);
            $table->string('currency', 8);
            $table->string('barcode_type', 50);
            $table->timestamps();
        });

        DB::table('settings')->insert([
            'language'     => 'es',
            'color'        => 'white',
            'ph_name'      => 'DEMO INBMOBILIARIA S.R.L.',
            'ph_address'   => 'Urb. XXX I Etapa Mz. X Lte. XXX Nuevo Chimbote  - Ancash - Peru',
            'ph_telephone' => 'XXXXXX',
            'ph_email'     => 'XXXXXX@XXXXX.com',
            'ph_fax'       => 'xxxxxxxxx',
            'ph_print'     => '1',
            'currency'     => 'soles',
            'barcode_type' => 'Infectious diseases‎',

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
