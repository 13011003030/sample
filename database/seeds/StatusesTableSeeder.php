<?php

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = range(1,50);
        $faker = app(Faker\Generator::class);

        $statuses = factory(Status::class)->times(500)->make()->each(function($status) use ($faker, $user_ids){
            $status->user_id = $faker->randomElement($user_ids);
        });

        Status::insert($statuses->toArray());
    }
}
