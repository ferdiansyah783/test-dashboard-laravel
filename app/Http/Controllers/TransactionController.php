<?php

namespace App\Http\Controllers;

use App\Services\Transaction\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index(Request $request)
    {
        $transactions = $this->transactionService->findAll($request);

        return view('backstore.transactoin', compact('transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required',
            'product_id' => 'required',
            'total_amount' => 'required'
        ]);

        $data = $request->all();
        $data['customer_id'] = auth()->user()->id;

        $this->transactionService->create($data);

        return redirect()->route('home')->with('success', 'Transaction created successfully.');
    }
}
