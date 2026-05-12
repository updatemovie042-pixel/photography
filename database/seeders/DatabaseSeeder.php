<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $demoUser = User::updateOrCreate(
            ['email' => 'demo@example.com'],
            [
                'name' => 'Demo User',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        Admin::updateOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );

        $services = [
            ['name' => 'Birthday Party Photoshoot', 'category' => 'Birthday', 'price' => 14999],
            ['name' => 'Pre Wedding Shoot', 'category' => 'Pre Wedding', 'price' => 29999],
            ['name' => 'Wedding Photography', 'category' => 'Wedding', 'price' => 49999],
            ['name' => 'Engagement Shoot', 'category' => 'Wedding', 'price' => 19999],
            ['name' => 'Corporate Event Shoot', 'category' => 'Corporate', 'price' => 24999],
            ['name' => 'Fashion Shoot', 'category' => 'Fashion', 'price' => 21999],
        ];

        $createdServices = collect();

        foreach ($services as $service) {
            $createdServices->push(Service::updateOrCreate(
                ['name' => $service['name']],
                [
                    'description' => $service['name'].' with professional coverage and editing.',
                    'category' => $service['category'],
                    'price' => $service['price'],
                    'duration' => '4 hours',
                ]
            ));
        }

        $demoService = $createdServices->firstWhere('name', 'Wedding Photography') ?? Service::first();

        if ($demoService) {
            Booking::updateOrCreate(
                [
                    'event_date' => now()->addDays(10)->toDateString(),
                    'event_time' => '16:00:00',
                ],
                [
                    'user_id' => $demoUser->id,
                    'service_id' => $demoService->id,
                    'full_name' => $demoUser->name,
                    'contact_number' => '9876543210',
                    'address' => 'Demo Banquet Hall, MG Road, Ahmedabad',
                    'additional_notes' => 'Demo booking so the admin panel has a sample request to review.',
                    'service_name' => $demoService->name,
                    'service_category' => $demoService->category,
                    'price' => $demoService->price,
                    'status' => 'Pending',
                ]
            );
        }
    }
}
