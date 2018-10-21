<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function acceptPayments()
    {
        return view('tutorial.accept_payments');
    }

    public function pay()
    {
        return view('tutorial.how_to_pay');
    }
}
