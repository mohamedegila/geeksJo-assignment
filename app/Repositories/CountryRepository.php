<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository extends BaseRepository
{
    public function __construct(Country $country, $searchColumns = ["name"], $selects = [])
    {
        parent::__construct($country, $searchColumns, $selects);
    }
}
