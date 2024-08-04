<?php

namespace Database\Seeders;

use App\Models\coachPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoachPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       coachPlan::factory(5)->create();
    }
}