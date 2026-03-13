<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use App\Models\User;

class WeightLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             // user 1件
    $user = User::factory()->create();

    // weight_logs 35件
    WeightLog::factory()
        ->count(35)
        ->create([
            'user_id' => $user->id
        ]);

    // weight_target 1件
    WeightTarget::factory()->create([
        'user_id' => $user->id
    ]);
    }
}
