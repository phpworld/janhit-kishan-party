<?php

namespace App\Models;

use CodeIgniter\Model;

class SiteSettingModel extends Model
{
    protected $table      = 'site_settings';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['setting_group', 'setting_key', 'setting_value'];

    /**
     * Get a single setting value by key.
     */
    public function get(string $key, string $default = ''): string
    {
        $row = $this->where('setting_key', $key)->first();
        return $row ? (string) $row['setting_value'] : $default;
    }

    /**
     * Get all settings for a group as key => value map.
     */
    public function getGroup(string $group): array
    {
        $rows = $this->where('setting_group', $group)->findAll();
        $out  = [];
        foreach ($rows as $row) {
            $out[$row['setting_key']] = $row['setting_value'];
        }
        return $out;
    }

    /**
     * Get ALL settings as flat key => value map.
     */
    public function getAll(): array
    {
        $rows = $this->findAll();
        $out  = [];
        foreach ($rows as $row) {
            $out[$row['setting_key']] = $row['setting_value'];
        }
        return $out;
    }

    /**
     * Save/upsert a batch of key=>value for a group.
     */
    public function saveGroup(string $group, array $data): void
    {
        foreach ($data as $key => $value) {
            $existing = $this->where('setting_key', $key)->first();
            if ($existing) {
                $this->update($existing['id'], ['setting_value' => $value]);
            } else {
                $this->insert(['setting_group' => $group, 'setting_key' => $key, 'setting_value' => $value]);
            }
        }
    }
}
