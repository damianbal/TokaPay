<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['receiver_id', 'payer_id', 'amount', 'title'];

    public function receiver()
    {
        return $this->hasOne(App\User::class, 'receiver_id');
    }

    public function payer()
    {
        return $this->hasOne(App\User::class, 'payer_id');
    }
}
