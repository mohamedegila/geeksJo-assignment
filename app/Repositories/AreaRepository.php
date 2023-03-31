<?php

namespace App\Repositories;

use App\Models\Area;

class AreaRepository extends BaseRepository
{
    public function __construct(Area $area, $searchColumns = ["name"], $selects = [])
    {
        parent::__construct($area, $searchColumns, $selects);
    }
}
