<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Comment extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['commentable_id', 'commentable_type', 'content'];

    public function commentable()
    {
        return $this->morphTo();
    }
}
