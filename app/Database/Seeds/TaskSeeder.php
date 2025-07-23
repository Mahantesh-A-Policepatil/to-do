<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create(); // creates a Faker\Generator instance
        $data = [];

        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'title'      => $faker->sentence(4), // generates a short random sentence
                'created_at' => $faker->date('Y-m-d H:i:s'),
                'updated_at' => $faker->date('Y-m-d H:i:s'),
            ];
        }

        $this->db->table('tasks')->insertBatch($data);
    }
}
