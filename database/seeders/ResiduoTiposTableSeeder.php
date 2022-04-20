<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ResiduoTiposTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('residuo_tipos')->delete();
        
        \DB::table('residuo_tipos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Resto de Poda',
                'status' => 1,
                'created_at' => '2022-03-11 21:58:20',
                'updated_at' => '2022-03-11 21:58:20',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Escombros',
                'status' => 1,
                'created_at' => '2022-03-11 21:58:41',
                'updated_at' => '2022-03-11 21:58:50',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Animales Muertos',
                'status' => 1,
                'created_at' => '2022-03-11 21:59:15',
                'updated_at' => '2022-03-11 21:59:15',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Muebles',
                'status' => 1,
                'created_at' => '2022-03-11 21:59:24',
                'updated_at' => '2022-03-11 21:59:24',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Restos de Carpinteria',
                'status' => 1,
                'created_at' => '2022-03-11 21:59:44',
                'updated_at' => '2022-03-11 21:59:44',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Chatarra',
                'status' => 1,
                'created_at' => '2022-03-11 22:00:03',
                'updated_at' => '2022-03-11 22:00:03',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Bioinfeciosos',
                'status' => 1,
                'created_at' => '2022-03-11 22:00:28',
                'updated_at' => '2022-03-11 22:00:28',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Cristalería',
                'status' => 1,
                'created_at' => '2022-03-11 22:01:02',
                'updated_at' => '2022-03-11 22:01:02',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Llantas',
                'status' => 1,
                'created_at' => '2022-03-11 22:01:17',
                'updated_at' => '2022-03-11 22:01:17',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'Plasticos',
                'status' => 1,
                'created_at' => '2022-03-11 22:01:32',
                'updated_at' => '2022-03-11 22:01:32',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'nombre' => 'Viceras',
                'status' => 1,
                'created_at' => '2022-03-11 22:01:42',
                'updated_at' => '2022-03-11 22:01:42',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'nombre' => 'Lodo de Cuneta',
                'status' => 1,
                'created_at' => '2022-03-11 22:02:14',
                'updated_at' => '2022-03-11 22:02:14',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}