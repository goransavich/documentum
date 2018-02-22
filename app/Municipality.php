<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $primaryKey = 'municipality_id';

    protected $fillable = ['municipality_name'];

    public function city()
    {
    	return $this->hasMany(City::class);
    }

    public function subjects()
    {
    	return $this->hasMany(Subject::class);
    }
}
