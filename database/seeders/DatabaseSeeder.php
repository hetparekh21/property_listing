<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\category;
use App\Models\prop_img;
use App\Models\properties;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {

            $path = 'public/imgs/' . rand(1, 18) . '.png';

            $category = new category();
            $category->category_name = $faker->name;
            $category->img = file_get_contents($path);
            $category->tags = str_replace(' ', ',', $faker->text(20));
            $category->save();

            for ($j = 0; $j < 10; $j++) {

                $property = new properties();
                $property->category()->associate($category);
                $property->property_name = $faker->name;
                $property->description = $faker->text(100);
                $property->price = $faker->numberBetween(100, 1000);
                $property->location = $faker->address;
                $property->tags = str_replace(' ', ',', $faker->text(20));
                $property->save();

                $path = 'public/imgs/' . rand(1, 18) . '.png';

                $prom_img = new prop_img();
                $prom_img->img = file_get_contents($path);
                $prom_img->property()->associate($property);
                $prom_img->save();
            }
        }
    }
}
