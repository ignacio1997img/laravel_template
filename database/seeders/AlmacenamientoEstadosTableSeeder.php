<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AlmacenamientoEstadosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('almacenamiento_estados')->delete();
        
        \DB::table('almacenamiento_estados')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Acomodado',
                'status' => 1,
                'created_at' => '2022-03-11 22:26:59',
                'updated_at' => '2022-03-11 22:26:59',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Embolsado',
                'status' => 1,
                'created_at' => '2022-03-11 22:27:17',
                'updated_at' => '2022-03-11 22:27:17',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Mesclado',
                'status' => 1,
                'created_at' => '2022-03-11 22:28:04',
                'updated_at' => '2022-03-11 22:28:04',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Disperso',
                'status' => 1,
                'created_at' => '2022-03-11 22:28:15',
                'updated_at' => '2022-03-11 22:28:15',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}