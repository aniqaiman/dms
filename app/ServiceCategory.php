<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $table = 'servicescategories';
    protected $primaryKey = 'servicecat_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'servicecat_name',
    	];

    public function services()
    {
    	return $this->belongsTo('App\Service', 'servicecat_id');
    }	
}

