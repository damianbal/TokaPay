<?php

namespace App\Http\Controllers;

use App\PaymentToken;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTokenRequest;
use App\Services\PaymentService;

class PaymentTokenController extends Controller
{
    /** @var \App\Services\PaymentService */
    protected $paymentService = null;
    
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return tokens
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment_token.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTokenRequest $request)
    {
        $amount = $request->input('amount');

        $paymentToken = $this->paymentService->createPaymentToken(auth()->user(), $amount);

        if($paymentToken == null) return back()->with('messages', ['Could not create payment token!']);

        return back()->with('messages', ['Created payment token, token: ' . $paymentToken->token]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentToken  $paymentToken
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentToken $paymentToken)
    {
        // ... delete
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentToken  $paymentToken
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentToken $paymentToken)
    {
        // ... delete
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentToken  $paymentToken
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentToken $paymentToken)
    {
        // ... delete
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentToken  $paymentToken
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentToken $paymentToken)
    {
        if(!auth()->user()->can('delete', $paymentToken)) {
            return back()->with('messages', ['You can not delete that payment token!']);
        }
        
        $paymentToken->delete();

        return back()->with('messages', ['Payment token removed!']);
    }
}
