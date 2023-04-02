<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    public function __construct($model)
    {
        parent::__construct($model);
    }
}
