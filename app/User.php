<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'dpi', 'lastname', 'email', 'phone', 'url_image', 'password', 'role_id', 'status_id', 'check_terms', 'score_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function score()
    {
        return $this->belongsTo("App\Score", 'score_id');
    }

    public function status()
    {
        return $this->belongsTo("App\Status", 'status_id');
    }

    public function findForPassport($username)
    {
        return User::orWhere('email', $username)->orWhere('phone', $username)->first();
    }
}
