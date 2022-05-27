<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert(array(
            array(
                'name' => "Silver",
                'cost' => '100',
                'limit' =>'5',
            ),
            array(
                'name' => "Gold",
                'cost' => '200',
                'limit' =>'10',
            ),
            array(
                'name' => "Platinum",
                'cost' => '300',
                'limit' =>'20',
            )
        ));


}

}
