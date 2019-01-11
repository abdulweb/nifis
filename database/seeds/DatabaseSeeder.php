<?php

use Illuminate\Database\Seeder;
use Modules\Marriage\Entities\Status;
use Modules\Family\Entities\Tribe;
use Modules\Profile\Entities\Gender;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\User::class, 25)->create()->each(function ($u) {
        for ($i=0; $i <= 3; $i++) {
          $u->posts()->save(factory(App\Post::class)->make());
        }  
      });

      Status::firstOrCreate([
        'name'=>'First Wife'
      ]);
      Status::firstOrCreate([
        'name'=>'Second Wife'
      ]);
      Status::firstOrCreate([
        'name'=>'Third Wife'
      ]);
      Status::firstOrCreate([
        'name'=>'Forth Wife'
      ]);

      Gender::firstOrCreate([
        'name'=>'Male'
      ]);
      Gender::firstOrCreate([
        'name'=>'Female'
      ]);
      Gender::firstOrCreate([
        'name'=>'Other'
      ]);

      Tribe::firstOrCreate([
        'name'=>'Hausa'
      ]);
      Tribe::firstOrCreate([
        'name'=>'Fulfulde'
      ]);
      Tribe::firstOrCreate([
        'name'=>'Yoruba'
      ]);
      Tribe::firstOrCreate([
        'name'=>'Chlela'
      ]);
     
    }
}
