<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class AktorSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('ko_KR');
        for ($i = 0; $i < 50; $i++) {
            $data = [
                // [
                //     'nama' => 'Byun Yohan',
                //     'agensi'    => 'YG Ent',
                //     'created_at' => Time::now(),
                //     'updated_at' => Time::now()
                // ],

                'nama'          => $faker->name(),
                'agensi'        => $faker->company(),
                'created_at'    => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'    => Time::now()

            ];

            // // Simple Queries
            // $this->db->query('INSERT INTO aktor (nama, agensi, created_at, updated_at) VALUES(:nama:, :agensi:, :created_at:, :updated_at:)', $data);

            // Using Query Builder
            $this->db->table('aktor')->insert($data);
            // $this->db->table('aktor')->insertBatch($data);
        }
    }
}
