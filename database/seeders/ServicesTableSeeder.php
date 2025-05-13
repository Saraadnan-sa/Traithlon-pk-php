<?php

namespace Database\Seeders;
use App\Model\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {

        Service::factory()->count(10)->create();
        
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
            [
                'name' => 'Yoga Classes',
                'details' => 'Relaxing and restorative yoga sessions to improve flexibility and mental well-being.',
                'price' => 4000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Nutritional Counseling',
                'details' => 'Professional guidance on diet and nutrition to help you achieve your fitness goals.',
                'price' => 3000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Strength Training',
                'details' => 'Customized strength-building programs focused on muscle growth and endurance.',
                'price' => 5500,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Zumba Dance Classes',
                'details' => 'Fun and energetic dance-based fitness classes to keep you in shape.',
                'price' => 3500,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pilates Training',
                'details' => 'Focused on core strength and posture improvement through Pilates techniques.',
                'price' => 4500,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cardio Kickboxing',
                'details' => 'High-energy cardio workouts mixed with martial arts techniques.',
                'price' => 4000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Massage Therapy',
                'details' => 'Relaxing and therapeutic massages to relieve stress and improve recovery.',
                'price' => 6000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Swim Lessons',
                'details' => 'Learn swimming or improve your techniques with professional instructors.',
                'price' => 5000,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
