<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    protected $primaryKey = 'inspection_id';

    protected $fillable = ['inspection_name', 'department_id'];

    public function departments()
    {
    	return $this->belongsTo(Department::class);
    }

    public function users()
    {
    	return $this->hasMany(User::class);
    }

    
}
