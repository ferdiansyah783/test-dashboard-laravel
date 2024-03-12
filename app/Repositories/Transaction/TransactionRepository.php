<?php

namespace App\Repositories\Transaction;

use Illuminate\Http\Request;
use LaravelEasyRepository\Repository;

interface TransactionRepository extends Repository{

    public function create($data);

    public function findAll(Request $request, $user_id);

    public function findTransactionByCustomerId($id);
}
