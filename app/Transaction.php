<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['receiver_id', 'payer_id', 'amount', 'title'];

    public function receiver()
    {
        return $this->hasOne(User::class, 'id', 'receiver_id');
    }

    public function payer()
    {
        return $this->hasOne(User::class, 'id', 'payer_id');
    }
}
