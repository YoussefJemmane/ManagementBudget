<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Laboratory;

class LaboratorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create  data to each user role not fake data
        $laboratory = Laboratory::create([
            'name' => 'Laboratoire de recherche en informatique',
            'budget' => '1000000',
        ]);
        $laboratory = Laboratory::create([
            'name' => 'Laboratoire de recherche en biologie',
            'budget' => '1000000',
        ]);
        
    }
}
