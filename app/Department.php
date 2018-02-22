<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'department_id';

    protected $fillable = ['department_label', 'department_name'];

    public function classes()
    {
    	return $this->belongsToMany(Clas::class, 'clas_department','department_id' ,'clas_id');
    }

    public function units()
    {
    	return $this->hasMany(Unit::class);
    }

    public function inspections()
    {
        return $this->hasMany(Inspection::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
