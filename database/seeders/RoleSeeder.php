<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'centreappuiAdmin']);
        Role::create(['name' => 'centreappuiGestion']);
        Role::create(['name' => 'centreanalyse']);
        Role::create(['name' => 'student']);
        Role::create(['name' => 'enseignant']);
        Role::create(['name' => 'directeur']);
        Role::create(['name' => 'entreprise']);
    }
}
