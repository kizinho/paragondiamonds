<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanTableDataSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $plan = new Plan();
        $plan->name = 'ECONOMY';
        $plan->percentage = 5;
        $plan->min = 10000;
        $plan->ref = 5;
        $plan->max = 0;
        $plan->trading_commision = 10;
        $plan->compound_id = 1;
        $plan->save();

//        //plan2
        $plan2 = new Plan();
        $plan2->name = 'BUSINESS';
        $plan2->percentage = 10;
        $plan2->min = 1000000;
        $plan2->ref = 10;
        $plan2->max = 0;
        $plan2->trading_commision = 10;
        $plan2->compound_id = 1;
        $plan2->save();


    }

}
