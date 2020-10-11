<?php

namespace Database\Seeders;

use App\Models\Opportunity;
use App\Models\OpportunityDetail;
use Illuminate\Database\Seeder;

class OpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->count(200)->create();
        Opportunity::factory()->count(300)->create()->each(function ($opportunity) {
            $opportunity -> detail() -> save(OpportunityDetail::factory()->make());
        });
    }
}
