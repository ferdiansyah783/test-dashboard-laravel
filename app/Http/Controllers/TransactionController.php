<?php

namespace App\Http\Controllers;

use App\Services\Transaction\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index(Request $request)
    {
        $user = $request->user();

        if (Gate::denies('viewBackstore', $user)) {
            abort(403, 'Unauthorized action.');
        }

        $transactions = $this->transactionService->findAll($request, $user->id);

        return view('backstore.transactoin', compact('transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required',
            'product_id' => 'required',
            'total_amount' => 'required',
            'seller_id' => 'required'
        ]);

        $data = $request->all();
        $data['customer_id'] = auth()->user()->id;

        $this->transactionService->create($data);

        return redirect()->route('home')->with('success', 'Transaction created successfully.');
    }
}
