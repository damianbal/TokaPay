<?php

namespace App\Services;

use App\PaymentToken;
use App\Services\UserService;
use App\Transaction;
use App\User;
use Illuminate\Support\Carbon;

class PaymentService
{
    /** @var \App\Services\UserService */
    protected $userService = null;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    private function generateToken()
    {
        $token = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token);
        return $token;
    }

    /**
     * Verify that token is valid
     *
     * @param PaymentToken $paymentToken
     * @return void
     */
    public function verifyToken(PaymentToken $paymentToken)
    {
        if (!$paymentToken->valid) {
            return false;
        }

        if (Carbon::now()->gt($paymentToken->valid_until)) {
            $paymentToken->valid = false;
            return false;
        }

        if ($paymentToken->user->balance < $paymentToken->amount) {
            $paymentToken->valid = false;
            return false;
        }

        return true;
    }

    /**
     * Transfer funds between users
     *
     * @param User $payer
     * @param User $receiver
     * @param float $amount
     * @return void
     */
    public function transferFunds(User $payer, User $receiver, $amount)
    {
        $this->userService->decreaseBalance($payer, $amount);
        $this->userService->increaseBalance($receiver, $amount);
    }

    /**
     * Process payment, transfer funds between users
     *
     * @param User $payer
     * @param User $receiver
     * @param PaymentToken $paymentToken
     * @param float $amount
     * @return boolean
     */
    public function processPayment(
        User $payer,
        User $receiver,
        PaymentToken $paymentToken, $amount, $title) {
        if (!$this->verifyToken($paymentToken)) {
            return false;
        }

        $this->transferFunds($payer, $receiver, $amount);

        Transaction::create([
            'payer_id' => $paymentToken->user->id,
            'receiver_id' => $receiver->id,
            'amount' => $amount,
            'title' => $title,
        ]);

        $paymentToken->valid = false;
        $paymentToken->save();

        return true;
    }

    /**
     * Create payment token for user
     *
     * @param User $user
     * @param float $amount
     * @return \App\PaymentToken
     */
    public function createPaymentToken(User $user, $amount)
    {
        // user does not have sufficient funds so we cannot create payment
        // token
        if ($user->balance < $amount) {
            return null;
        }

        $tok = $this->generateToken();

        // create payment token
        $paymentToken = PaymentToken::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'token' => $tok,
            'valid' => true,
            'valid_until' => Carbon::now()->addDay(1)->toDateString(),
        ]);

        return $paymentToken;
    }
}
