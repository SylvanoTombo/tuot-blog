<?php

use Phinx\Seed\AbstractSeed;

class PostSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        $data = [];

        for ($i=0; $i < 50; $i++) { 
            $data[] = [
                'name' => $faker->sentence(),
                'slug' => $faker->slug,
                'content' => $faker->paragraphs(rand(3, 10), true),
                'created_at' => $faker->date . ' ' . $faker->time
            ];
        }

        $this->insert('post', $data);

    }
}
