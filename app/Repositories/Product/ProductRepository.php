<?php

namespace App\Repositories\Product;

use Illuminate\Http\Request;
use LaravelEasyRepository\Repository;

interface ProductRepository extends Repository{

    public function create($data);

    public function findAll(Request $request, $user_id);
}
