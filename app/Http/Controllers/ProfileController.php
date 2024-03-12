<?php

namespace App\Http\Controllers;

use App\Services\Transaction\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProfileController extends Controller
{
    public $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index() {
        $user = auth()->user();

        if (Gate::denies('viewFrontstore', $user)) {
            abort(403, 'Unauthorized action.');
        }

        $transactions = $this->transactionService->findTransactionByCustomerId($user->id);

        return view('frontstore.profile', compact('transactions'));
    }
}
