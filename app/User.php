<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'name',
    	'email',
    	'password',
    	'address',
    	'billinginfo',
    	'creditcardinfo',
    	'phonenumber',
    	'profilepic'
    ];

    public function tours()
    {
        return $this->belongsTo('App\Tour', 'tour_id');
    }
}
