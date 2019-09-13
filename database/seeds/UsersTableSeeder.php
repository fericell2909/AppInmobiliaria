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
        $dato->documento="000";
        $dato->name="Administrador";
        $dato->email="44577092";
        $dato->password=bcrypt('secret');
        $dato->rol_id=1;      
        $dato->estado=1;        
        $dato->save();

        $dato = new User();   
        $dato->documento="001";
        $dato->name="Supervisor";
        $dato->email="32542348";
        $dato->password=bcrypt('secret');
        $dato->rol_id=2;      
        $dato->estado=1;        
        $dato->save();

        $dato = new User();   
        $dato->documento="002";
        $dato->name="Coordinador Regional";
        $dato->email="32659846";
        $dato->password=bcrypt('secret');
        $dato->rol_id=3;      
        $dato->estado=1;        
        $dato->save();

        $dato = new User();   
        $dato->documento="003";
        $dato->name="Coordinador Local";
        $dato->email="32323232";
        $dato->password=bcrypt('secret');
        $dato->rol_id=4;      
        $dato->estado=1;        
        $dato->save();

    }
}
