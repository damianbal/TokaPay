<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class DashboardController extends Controller
{
    //
    public function index(Request $request)
    {
//        $transactions = auth()->user()->transactions()->paginate(10);
        $transactions = Transaction::where('payer_id', auth()->user()->id)
                                   ->orWhere('receiver_id', auth()->user()->id)
                                   ->orderBy('created_at','DESC')
                                   ->paginate(10);

        return view('dashboard.transactions', ['transactions' => $transactions]);
    }

    public function tokens(Request $request)
    {
        $tokens = auth()->user()->tokens()->paginate(10);

        return view('dashboard.tokens', ['tokens' => $tokens]);
    }
}
