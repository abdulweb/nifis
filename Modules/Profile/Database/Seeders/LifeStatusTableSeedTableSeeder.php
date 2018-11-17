<?php

namespace Modules\Profile\Database\Seeders;


use Module\Profile\Entitie\LifeStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LifeStatusTableSeedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $lives = [
               'Life',
               'Death',
            ];
            foreach($lives as $life){
                LifeStatus::firstOrCreate('name'=>$life);
            }
    }
}
