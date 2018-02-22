<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $primaryKey = 'unit_id';

    protected $fillable = ['unit_label', 'unit_name', 'department_id'];

    public function departments()
    {
    	return $this->belongsTo(Department::class);
    }

    public function subjects()
    {
    	return $this->hasMany(Subject::class);
    }
}
