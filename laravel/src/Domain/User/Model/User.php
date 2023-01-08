<?php

namespace Domain\User\Model;

use Builder\UserBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'login',
        'password',
    ];

    public function task(): HasMany{
        return $this->hasMany();
    }

    public function newEloquentBuilder($query)
    {
        return new UserBuilder($query);
    }
}
