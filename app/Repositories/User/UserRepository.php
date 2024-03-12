<?php

namespace App\Repositories\User;

use App\Models\User;
use LaravelEasyRepository\Repository;

interface UserRepository extends Repository{
    public function create($data);
}
