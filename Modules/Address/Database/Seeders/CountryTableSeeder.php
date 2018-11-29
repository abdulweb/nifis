<?php

namespace Modules\Address\Database\Seeders;

use Module\Address\Entities\Country
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Country::firstOrCreate(['country' => 'Nigeria']);
    }
}
