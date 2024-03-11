<?php

namespace App\Repositories\Transaction;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionRepositoryImplement extends Eloquent implements TransactionRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function findAll(Request $request)
    {
        return $this->model->with(['product', 'customer'])
            ->whereHas('product', function ($query) use ($request) {
                $query->where('name', 'like', "%$request->search%");
            })
            ->orWhereHas('customer', function ($query) use ($request) {
                $query->where('name', 'like', "%$request->search%");
            })
            ->orWhere('reference_number', 'like', "%$request->search%")
            ->paginate(5);
    }
}
