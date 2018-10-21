<?php

namespace App\Relations;

use App\PaymentToken;


trait HasTokens
{
    public function tokens()
    {
        return $this->hasMany(PaymentToken::class)->latest();
    }
}
