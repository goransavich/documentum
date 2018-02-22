<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'active', 'status', 'department_id', 'inspection_id'
    ];

    protected $primaryKey = 'user_id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }

    public function departments()
    {
        return $this->belongsTo(Department::class);
    }

    public function inspections()
    {
        return $this->belongsTo(Inspection::class);
    }

    public function hasRole(array $role)
    {
        return in_array($this->status, $role);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'user_id', 'subject_id');
    }
}
