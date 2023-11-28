<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'lastname', 'email',  'age', 'city'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function scopeWithRoles($query, $userId)
    {
        return $query->with('roles')->find($userId);
    }
}
