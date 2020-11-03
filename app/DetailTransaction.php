<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DetailTransaction extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'user_id', 'date', 'transaction_id', 'trash_id', 'weight', 'date', 'donatur'];

    public function trash(){
        return $this->belongsTo('App\Trash');
    }

    public function transaction(){
        return $this->belongsTo('App\Transaction');
    }
}
