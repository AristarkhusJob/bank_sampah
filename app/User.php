<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

//class User extends Model
class User extends Authenticatable
{
    /*public $timestamps = false;
    protected $primaryKey = 'id';*/
    protected $fillable = ['username', 'password', 'name', 'type'];
    protected $hidden = ['password', 'remember_token'];

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
