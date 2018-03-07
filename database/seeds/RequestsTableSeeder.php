<?php

use Illuminate\Database\Seeder;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
        //
        $user = App\User::all();
        $category = App\Category::whereNotNull('parent_id')
            ->get();
        //
        for ($i=0; $i < 10; $i++) {
            $u = $user->random();
            $cat = $category->random();
            $data = [
                'user_id' => $u->id,
                'category_id' => $cat->id,
                'note' => $faker->realText(100),
                'prefecture' => collect(array_flip(config('my.prefectures')))->random(),
                'city' => $faker->city,
                'location' => $faker->address,
                'span_time' => 5,
                'public' => true,
                'total_option_price' => 0,
            ];
            App\Request::create($data);
        }
    }
}
