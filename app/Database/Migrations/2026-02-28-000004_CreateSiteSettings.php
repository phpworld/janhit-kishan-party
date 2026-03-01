<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSiteSettings extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'setting_group' => ['type' => 'VARCHAR', 'constraint' => 60, 'default' => 'general'],
            'setting_key'   => ['type' => 'VARCHAR', 'constraint' => 120, 'null' => false],
            'setting_value' => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('setting_key');
        $this->forge->createTable('site_settings');

        // Seed default values
        $defaults = [
            // General
            ['general', 'site_name',          'Janhit Kisan Party'],
            ['general', 'site_tagline',        'Awaz Kisan Ki – Voice of the Farmers'],
            ['general', 'site_meta_desc',      'Official website of Janhit Kisan Party – dedicated to the welfare of farmers and rural India.'],
            ['general', 'ticker_text',         'Breaking: Farmer Welfare Bill Passed • National Agriculture Summit 2026 • Membership Drive Open Now'],
            ['general', 'left_sidebar_html',   ''],
            ['general', 'right_sidebar_html',  ''],
            // Contact
            ['contact', 'address_line1',       'JKP National Headquarters,'],
            ['contact', 'address_line2',       '5 Raisina Road, New Delhi – 110001'],
            ['contact', 'phone1',              '+91 11 2345 6789'],
            ['contact', 'phone2',              '+91 98765 43210'],
            ['contact', 'email1',              'info@jkp.org.in'],
            ['contact', 'email2',              'support@jkp.org.in'],
            ['contact', 'whatsapp_number',     '+919876543210'],
            ['contact', 'whatsapp_label',      'WhatsApp Helpline'],
            ['contact', 'working_hours',       'Mon – Sat: 9:00 AM – 6:00 PM'],
            ['contact', 'map_embed_url',       'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.6624993085285!2d77.19867!3d28.6249!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd378cf0f8af%3A0x45ae94dbc0ec4954!2sRaisina%20Hill%2C%20New%20Delhi!5e0!3m2!1sen!2sin!4v1700000000000'],
            // Social Media
            ['social', 'facebook_url',         'https://facebook.com/JanhitKisanParty'],
            ['social', 'facebook_handle',      '/JanhitKisanParty'],
            ['social', 'twitter_url',          'https://twitter.com/JKP_Official'],
            ['social', 'twitter_handle',       '@JKP_Official'],
            ['social', 'instagram_url',        'https://instagram.com/kjp_india'],
            ['social', 'instagram_handle',     '@kjp_india'],
            ['social', 'youtube_url',          'https://youtube.com/@JanhitKisanParty'],
            ['social', 'youtube_handle',       'Janhit Kisan Party'],
            ['social', 'whatsapp_group_url',   'https://chat.whatsapp.com/'],
            ['social', 'share_facebook',       '1'],
            ['social', 'share_twitter',        '1'],
            ['social', 'share_whatsapp',       '1'],
        ];

        foreach ($defaults as $row) {
            $this->db->table('site_settings')->insert([
                'setting_group' => $row[0],
                'setting_key'   => $row[1],
                'setting_value' => $row[2],
            ]);
        }
    }

    public function down(): void
    {
        $this->forge->dropTable('site_settings', true);
    }
}
