<?php

namespace App\Services;

use App\User;

class UserService
{
    public function increaseBalance(User $user, $amount)
    {
        $user->balance = $user->balance + $amount;
        $user->save();
    }

    public function decreaseBalance(User $user, $amount)
    {
        $user->balance = $user->balance - $amount;
        $user->save();
    }
}
