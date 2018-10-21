<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Relations\BelongsToUser;

class PaymentToken extends Model
{
    use BelongsToUser;

    protected $fillable = ['user_id', 'token', 'valid_until', 'amount', 'valid'];
}
