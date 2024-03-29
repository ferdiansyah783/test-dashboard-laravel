<?php

namespace App\Services\Transaction;

use Illuminate\Http\Request;
use LaravelEasyRepository\BaseService;

interface TransactionService extends BaseService{

    public function create($data);

    public function findAll(Request $request, $user_id);

    public function findCustomerTransactions(Request $request, $user_id);

    public function findTransactionByCustomerId($id);
}
