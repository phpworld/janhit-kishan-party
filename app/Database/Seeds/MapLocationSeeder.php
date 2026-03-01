<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MapLocationSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $locations = [
            ['name' => 'Lucknow',          'state' => 'UTTAR PRADESH', 'lat' => 27.1384050, 'lng' => 80.8593193],
            ['name' => 'PATANA',           'state' => 'BIHAR',         'lat' => 25.9039681, 'lng' => 85.8103119],
            ['name' => 'JAIPUR',           'state' => 'RAJASTHAN',     'lat' => 26.6297693, 'lng' => 73.8782402],
            ['name' => 'BHOPAL',           'state' => 'MADHYA PRADESH','lat' => 23.9694859, 'lng' => 78.4200043],
            ['name' => 'MUMBAI',           'state' => 'MAHARASHTRA',   'lat' => 18.8199672, 'lng' => 76.7764826],
            ['name' => 'India Gate',       'state' => 'DELHI',         'lat' => 28.6129000, 'lng' => 77.2295000],
            ['name' => 'Gateway of India', 'state' => 'MAHARASHTRA',   'lat' => 18.9220000, 'lng' => 72.8347000],
        ];

        foreach ($locations as $loc) {
            $this->db->table('map_locations')->insert([
                'name'       => $loc['name'],
                'state'      => $loc['state'],
                'lat'        => $loc['lat'],
                'lng'        => $loc['lng'],
                'is_active'  => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
