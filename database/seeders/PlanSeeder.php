<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'name' => 'Starter', 
                'slug' => 'starter', 
                'stripe_plan' => 'price_1MSL8jDRRd9Ji2zuoOmJNntz', 
                'price' => 30, 
                'description' => 'Unlimited Posts
                Facebook, Twitter, Instagram, LinkedIn, Reddit
                Post Multiple Images and Videos
                Chat Support'
            ],
            [
                'name' => 'Enterprise', 
                'slug' => 'enterprise', 
                'stripe_plan' => 'price_1MSL9PDRRd9Ji2zuNWssyVmM', 
                'price' => 200, 
                'description' => 'Unlimited Posts
                Facebook, Twitter, Instagram, LinkedIn, Telegram, Reddit, Google My Business, Pinterest, TikTok, YouTube
                Phone and email support
                Manage Multiple Users
                Additional Api Endpoint Support'
            ]
        ];
   
        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
