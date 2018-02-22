<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $primaryKey = 'subject_id';

    protected $fillable = ['city_id', 'clas_id', 'department_id', 'inspection_id', 'municipality_id', 'unit_id', 'user_id','subjecttype','title', 'controlled', 'owner', 'ord_number', 'ord_year', 'archive', 'document_id'];

    public function cities()
    {
    	return $this->belongsTo(City::class);
    }

    public function classes()
    {
    	return $this->belongsTo(Clas::class, 'clas_id');
    }

    public function departments()
    {
    	return $this->belongsTo(Department::class, 'department_id');
    }

    

    public function municipalities()
    {
    	return $this->belongsTo(Municipality::class);
    }

    public function units()
    {
    	return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }

    

}
