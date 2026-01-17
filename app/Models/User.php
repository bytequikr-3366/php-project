<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory;

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * Hidden fields
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the identifier stored in the JWT subject claim.
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key-value array, containing any custom claims.
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
