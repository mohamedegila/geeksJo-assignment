<?php

namespace App\Repositories;

use App\Models\City;

class CityRepository extends BaseRepository
{
    public function __construct(City $city, $searchColumns = ["name"], $selects = [])
    {
        parent::__construct($city, $searchColumns, $selects);
    }
}
