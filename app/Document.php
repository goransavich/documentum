<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $primaryKey = 'document_id';

    protected $fillable = ['file_name', 'subject_id', 'original_name', 'file_extension'];

    public function subjects()
    {
    	return $this->belongsTo(Subject::class);
    }

    public function haveExtension(array $extension)
    {
        return in_array($this->file_extension, $extension);
    }
}
