<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    protected $primaryKey = 'clas_id';

    protected $table = 'classes';

    protected $fillable = ['clas_label', 'clas_name'];

    public function departments()
    {
    	return $this->belongsToMany(Department::class, 'clas_department', 'clas_id', 'department_id');
    }

    public function subjects()
    {
    	return $this->hasMany(Subject::class);
    }


}
