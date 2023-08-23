<?php

namespace App\Repositories;

use App\Models\Call;

class CallRepository extends BaseRepository
{
    protected $model;
    public function __construct(Call $model)
    {
        $this->model = $model;
    }

}

