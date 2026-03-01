<?php

namespace App\Controllers;

use App\Models\MapLocationModel;

class ApiController extends BaseController
{
    public function mapLocations()
    {
        $locations = (new MapLocationModel())
            ->where('is_active', 1)
            ->findAll();

        $output = array_map(static function ($loc) {
            return [
                'id'    => (int) $loc['id'],
                'name'  => $loc['name'],
                'state' => $loc['state'],
                'lat'   => (float) $loc['lat'],
                'lng'   => (float) $loc['lng'],
            ];
        }, $locations);

        return $this->response
            ->setContentType('application/json')
            ->setBody(json_encode($output));
    }
}
