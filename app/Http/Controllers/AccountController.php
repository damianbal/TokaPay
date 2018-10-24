<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddFundsRequest;
use App\Services\PayService;

class AccountController extends Controller
{
    /** @var PayService */
    protected $payService = null;

    public function __construct(PayService $payService)
    {
        $this->payService = $payService;
    }

    public function addFunds()
    {
        return view('account.add_funds');
    }

    public function submitAddFunds(AddFundsRequest $request)
    {
        $cardInput = $request->only([
            'number', 
            'firstName', 
            'lastName', 
            'cvv', 
            'expiryYear', 
            'expiryMonth']);

        if($request->input('amount') > 100) {
            return back()->with('messages', ['You can only add funds below 100!']);
        }


        $result = $this->payService->addFunds(
            auth()->user(), 
            $request->input('amount'), 
            $cardInput);

        if($result['success'] == false) {
            return back()->with('messages', [$result['message']]);
        }

        if($result['success'] == true) {
            return back()->with('messages', ['Funds has been added to your account!']);
        }
    }
}
