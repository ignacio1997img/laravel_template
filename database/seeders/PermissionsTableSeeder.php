<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $keys = [
            'browse_admin',
            'browse_bread',
            'browse_database',
            'browse_media',
            'browse_compass',
        ];

        foreach ($keys as $key) {
            Permission::firstOrCreate([
                'key'        => $key,
                'table_name' => null,
            ]);
        }

        Permission::generateFor('menus');

        Permission::generateFor('roles');

        Permission::generateFor('users');

        Permission::generateFor('settings');


        Permission::generateFor('residuo_tipos');
        Permission::generateFor('almacenamiento_estados');
        Permission::generateFor('almacenamiento_lugars');





        $keys = [
            'browse_servicio',
            'add_servicio',
            'add_inspeccion',
            'add_costo_determinado',
            'add_programacion_atencion',
            'print',
        ];

        foreach ($keys as $key) {
            Permission::firstOrCreate([
                'key'        => $key,
                'table_name' => 'additional_service',
            ]);
        }



        

        

        
    }
}
