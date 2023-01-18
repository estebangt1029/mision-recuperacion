<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create trainers']);
        Permission::create(['name' => 'read trainers']);
        Permission::create(['name' => 'update trainers']);
        Permission::create(['name' => 'delete trainers']);

        Permission::create(['name' => 'create sports']);
        Permission::create(['name' => 'read sports']);
        Permission::create(['name' => 'update sports']);
        Permission::create(['name' => 'delete sports']);

        Permission::create(['name' => 'create positions']);
        Permission::create(['name' => 'read positions']);
        Permission::create(['name' => 'update positions']);
        Permission::create(['name' => 'delete positions']);

        Permission::create(['name' => 'create teams']);
        Permission::create(['name' => 'read teams']);
        Permission::create(['name' => 'update teams']);
        Permission::create(['name' => 'delete teams']);

        Permission::create(['name' => 'create players']);
        Permission::create(['name' => 'read players']);
        Permission::create(['name' => 'update players']);
        Permission::create(['name' => 'delete players']);
        
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleTrainer = Role::create(['name' => 'trainer']);

        $roleAdmin->givePermissionTo([
            'create trainers',
            'read trainers',
            'update trainers',
            'delete trainers',

            'create sports',
            'read sports',
            'update sports',
            'delete sports',

            'create positions',
            'read positions',
            'update positions',
            'delete positions',

            'create teams',
            'read teams',
            'update teams',
            'delete teams',

            'create players',
            'read players',
            'update players',
            'delete players',
        ]);

        $roleTrainer->givePermissionTo([
            'create players',
            'read players',
            'update players',
            'delete players',

            'create teams',
            'read teams',
            'update teams',
            'delete teams',
        ]);

    }
}
