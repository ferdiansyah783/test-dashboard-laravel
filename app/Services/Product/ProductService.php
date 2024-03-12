<?php

namespace App\Services\Product;

use Illuminate\Http\Request;
use LaravelEasyRepository\BaseService;

interface ProductService extends BaseService{

    public function findAll(Request $request, $user_id);
}
