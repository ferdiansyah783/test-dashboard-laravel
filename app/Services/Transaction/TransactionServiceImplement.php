<?php

namespace App\Services\Transaction;

use LaravelEasyRepository\Service;
use App\Repositories\Transaction\TransactionRepository;
use Illuminate\Http\Request;

class TransactionServiceImplement extends Service implements TransactionService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(TransactionRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function create($data)
    {
        return $this->mainRepository->create($data);
    }

    public function findAll(Request $request)
    {
        return $this->mainRepository->findAll($request);
    }
}
