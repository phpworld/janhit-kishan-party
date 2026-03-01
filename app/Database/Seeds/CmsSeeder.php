<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CmsSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $this->db->table('admin_users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@jkp.local',
            'password_hash' => password_hash('admin123', PASSWORD_DEFAULT),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $this->db->table('navigation_items')->insertBatch([
            ['label' => 'Home', 'url' => '#home', 'sort_order' => 1, 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['label' => 'About', 'url' => '#', 'sort_order' => 2, 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['label' => 'Members', 'url' => '#members', 'sort_order' => 3, 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['label' => 'Gallery', 'url' => '#footprints', 'sort_order' => 4, 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['label' => 'Contact', 'url' => '#', 'sort_order' => 5, 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);

        $this->db->table('home_sliders')->insertBatch([
            [
                'headline' => 'Empowering Farmers. Strengthening India.',
                'subheadline' => 'Join the agricultural revolution.',
                'image' => 'assets/img/leader.png',
                'layout' => 'right',
                'sort_order' => 1,
                'is_active' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'headline' => 'Growth for Every Village.',
                'subheadline' => 'Building a stronger, self-reliant rural India.',
                'image' => 'assets/img/leader1.png',
                'layout' => 'left',
                'sort_order' => 2,
                'is_active' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        $this->db->table('party_presidents')->insertBatch([
            ['name' => 'Shri Atal Bihari Vajpayee', 'tenure' => '1980 - 1986', 'image' => 'assets/img/Netajee.jpg', 'sort_order' => 1, 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Shri Lal Krishna Advani', 'tenure' => '1986 - 1990 | 1993 - 1998', 'image' => 'assets/img/Shyam-Sundar-dass.jpg', 'sort_order' => 2, 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Dr. Murli Manohar Joshi', 'tenure' => '1991 - 1993', 'image' => 'assets/img/Shivdayal.jpg', 'sort_order' => 3, 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);

        $this->db->table('footprint_settings')->insert([
            'title' => 'OUR FOOTPRINTS',
            'subtitle' => 'KJP-led Alliance governs 21 states',
            'states_governed' => 21,
            'lok_sabha' => '240/543',
            'rajya_sabha' => '99/245',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $this->db->table('inspiration_slides')->insertBatch([
            ['title' => 'OUR INSPIRATION', 'name' => 'Dr. Syama Prasad Mookerjee', 'description' => 'Founder of Bharatiya Jana Sangh', 'image' => 'assets/img/Netajee.jpg', 'button_text' => 'Read More', 'sort_order' => 1, 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'OUR INSPIRATION', 'name' => 'Shri Atal Bihari Vajpayee', 'description' => 'Former Prime Minister of India', 'image' => 'assets/img/Netajee.jpg', 'button_text' => 'Read More', 'sort_order' => 2, 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);

        $this->db->table('press_gallery_items')->insertBatch([
            ['title' => 'Agriculture Reform', 'subtitle' => 'Policy Initiatives', 'image' => 'assets/img/agriculture reform.jpg', 'box_type' => 'large', 'sort_order' => 1, 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Campaign Drive', 'subtitle' => 'Grassroots Outreach', 'image' => 'assets/img/Farmers Meet.jpg', 'box_type' => 'tall', 'sort_order' => 2, 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Rural Development', 'subtitle' => 'Community Programs', 'image' => 'assets/img/Rural Development.jpg', 'box_type' => 'medium', 'sort_order' => 3, 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
