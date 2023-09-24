<?php

namespace Database\Seeders;

use App\Models\plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Plans = [
            [
                'name' => 'Starter',
                'price' => 200,
                'contributors' => 1,
                'details' => '100 Info/month',
            ],
            [
                'name' => 'Business',
                'price' => 300,
                'contributors' => 1,
                'details' => '500 Info/month',
            ], [
                'name' => 'Professional',
                'price' => 500,
                'contributors' => 1,
                'details' => '1000 Info/month',
            ], [
                'name' => 'Premium',
                'price' => 700,
                'contributors' => 1,
                'details' => 'Unlimited Info/month',
            ],
        ];

        foreach ($Plans as $key => $plan) {
            plan::create($plan);
        }
    }
}
