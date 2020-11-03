<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Transaction extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'date', 'weightTotal', 'priceTotal'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function detailTransactions()
    {
        return $this->hasMany('App\DetailTransaction');
    }
}
