<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Traits\Seedable;

class DatabaseSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = __DIR__.'/';

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VoyagerDatabaseSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(DataTypesTableSeeder::class);
        $this->call(DataRowsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(ResiduoTiposTableSeeder::class);
        $this->call(AlmacenamientoLugarsTableSeeder::class);
        $this->call(AlmacenamientoEstadosTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
    }
}
