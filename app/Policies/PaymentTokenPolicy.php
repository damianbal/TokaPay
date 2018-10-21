<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\PaymentToken;

class PaymentTokenPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, PaymentToken $paymentToken)
    {
        return $user->id === $paymentToken->user->id;
    }
}
