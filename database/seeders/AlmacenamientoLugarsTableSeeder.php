<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AlmacenamientoLugarsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('almacenamiento_lugars')->delete();
        
        \DB::table('almacenamiento_lugars')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Sobre Acera',
                'status' => 1,
                'created_at' => '2022-03-11 22:28:57',
                'updated_at' => '2022-03-11 22:28:57',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Sobre Calle',
                'status' => 1,
                'created_at' => '2022-03-11 22:29:03',
                'updated_at' => '2022-03-11 22:29:03',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Interno',
                'status' => 1,
                'created_at' => '2022-03-11 22:29:13',
                'updated_at' => '2022-03-11 22:29:13',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}