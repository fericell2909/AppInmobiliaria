<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dato = new User();   
        $dato->documento="1014205146";
        $dato->name="Marco Estrada";
        $dato->email="fericell2909@gmail.com";
        $dato->password=bcrypt('secret');
        $dato->rol_id=1;      
        $dato->estado=1;        
        $dato->save();

        $dato = new User();   
        $dato->documento="1010";
        $dato->name="Usuario";
        $dato->email="correo@correo.com";
        $dato->password=bcrypt('secret');
        $dato->rol_id=1;      
        $dato->estado=1;        
        $dato->save();
    }
}
