<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $primaryKey = 'history_id';

    protected $fillable = ['subject_id', 'name_of_user', 'action'];

    protected $table = 'history';

    public function subjects()
    {
    	return $this->belongsTo(Subject::class);
    }
}
