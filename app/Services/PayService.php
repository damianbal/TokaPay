<?php

namespace App\Services;

use App\User;
use Omnipay\Omnipay;

class PayService
{
    protected $gateway = null;

    public function __construct()
    {
        $this->gateway = Omnipay::create('Stripe');

        $this->gateway->setApiKey(config('payment.stripe_apikey'));
    }

    /**
     * Add funds to user account by paying with card
     *
     * @param User $user
     * @param [type] $amount
     * @param [type] $card
     * @return void
     */
    public function addFunds(User $user, $amount, $card)
    {
        $response = $this->gateway->purchase([
            'amount' => $amount,
            'currency' => 'GBP',
            'card' => $card,
        ])->send();

        if ($response->isRedirect()) {
            $response->redirect();
        } elseif ($response->isSuccessful()) {
            $user->balance = $user->balance + $amount;
            $user->save();
            return ['success' => true];
        } else {
            return ['success' => false, 
                    'message' => $response->getMessage()];
        }
    }
}
