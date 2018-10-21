<?php

namespace App\Core;

use Illuminate\Http\Request;
use App\PaymentToken;
use App\User;


class RequestTokenTransformer
{
    /** 
     * @var \Illuminate\Http\Request 
     */
    protected $request = null;

    /**
     * 
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Returns payment token of request
     *
     *  @return \App\PaymentToken
     */
    public function getPaymentToken()
    {
        $tok = $this->request->get('paymentToken');

        if(!$this->request->has('paymentToken')) return null;

        return PaymentToken::where('token', $tok)->first();
    }
    
    /**
     * Returns user associated with access_key
     *
     * @return \App\User
     */
    public function getUser()
    {
        $accessKey = $this->request->get('accessKey');

        if (!$this->request->has('accessKey')) return null;

        return User::where('access_key', $accessKey)->first();
    }

}
