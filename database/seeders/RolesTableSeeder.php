<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $role = Role::firstOrNew(['name' => 'admin']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('voyager::seeders.roles.admin'),
            ])->save();
        }

        $role = Role::firstOrNew(['name' => 'user']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('voyager::seeders.roles.user'),
            ])->save();
        }

        $role = Role::firstOrNew(['name' => 'datos_solicitante']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('Registrar solicitud'),
            ])->save();
        }
        $role = Role::firstOrNew(['name' => 'inspeccion_previa']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('Registrar La Inspeccion Previa'),
            ])->save();
        }

        $role = Role::firstOrNew(['name' => 'costo_determinado']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('Registrar Costo Determinado'),
            ])->save();
        }
        $role = Role::firstOrNew(['name' => 'programacion_atencion']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('Registrar Programacion de la Atencion'),
            ])->save();
        }

        

    }
}
