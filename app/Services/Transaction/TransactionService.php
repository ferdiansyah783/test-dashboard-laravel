<?php

namespace App\Services\Transaction;

use Illuminate\Http\Request;
use LaravelEasyRepository\BaseService;

interface TransactionService extends BaseService{

    public function create($data);

    public function findAll(Request $request);
}
