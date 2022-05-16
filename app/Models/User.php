<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'mobile',
        'photo',
        'department_id',
        'level_id',
        'email',
        'verified',
        'role_id',
        'password',];

 protected $primaryKey = 'id';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    ///// one to one relations between roles ////
    public function Role()
    {
       
        return $this -> hasOne('App\Models\Role','role_id');
    }

    public function department()
    {
       
        return $this -> belongsTo('App\Models\Department','department_id');
    }
    public function level()
    {
       
        return $this -> belongsto('App\Models\Level','level_id');
    }

   


}
