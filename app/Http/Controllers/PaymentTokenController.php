<?php

namespace App\Http\Controllers;

use App\PaymentToken;
use Illuminate\Http\Request;

class PaymentTokenController extends Controller
{
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
    public function store(Request $request)
    {
        // store new token
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
        // ... leave
        
    }
}
