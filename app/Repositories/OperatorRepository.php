<?php

namespace App\Repositories;

use App\Models\Call;
use App\Models\Operator;

class OperatorRepository extends BaseRepository
{
    protected $model;
    public function __construct(Operator $model)
    {
        $this->model = $model;
    }

}

