<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('services')->insert([
            [
                'name' => 'Boot Camp Fitness',
                'details' => 'High-intensity group fitness classes designed to build strength and endurance.',
                'price' => 5000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Personal Training',
                'details' => 'One-on-one training with a certified trainer, tailored to your individual fitness level and goals.',
                'price' => 7000,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
