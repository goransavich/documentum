<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $primaryKey = 'city_id';

    protected $fillable = ['city_name', 'municipality_id'];

    public function municipality()
    {
    	return $this->belongsTo(Municipality::class);
    }

    public function subjects()
    {
    	return $this->hasMany(Subject::class);
    }
}
