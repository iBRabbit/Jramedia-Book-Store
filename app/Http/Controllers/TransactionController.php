<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index() {
        return view('transactions/index', [
            'title' => 'All Transactions',
            'active' => 'transactions',
            'transactions' => Transaction::paginate(10)
        ]);
    }

}
