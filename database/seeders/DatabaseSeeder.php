<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Trainer;
use \App\Models\Sport;
use \App\Models\Position;
use \App\Models\Team;
use \App\Models\Player;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            PermissionSeeder::class,
        ]);
        User::factory(2)->create();
        $admin = User::find(1);
        $admin->assignRole('admin');
        $trainer = User::find(2);
        $trainer->assignRole('trainer');

        
        Trainer::factory(10)->create();
        Sport::factory(10)->create();
        Position::factory(10)->create();
        Team::factory(10)->create();
        Player::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
