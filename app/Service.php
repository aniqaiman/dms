<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'service_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'service_cat',
    	'service_package',
    	'service_date',
    	'service_pax',
    	];

    public function servicecategories()
    {
    	return $this->hasMany('App\ServiceCategory', 'servicecat_id');
    }	
}
