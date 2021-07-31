<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use SoftDeletes;
    use HasRoles;
   // use SearchableTrait;


    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'lastname', 'email', 'password', 'status'
    ];

    protected $hidden = [];

    protected $appends = ['full_name'];


    protected $searchable = [
        'columns' => [
          'users.name' => 5,
          'users.lastname' => 5,
        ]
    ];


    /*
    |
    | ** Relationships model **
    |
    */

    public function logins()
    {
        return $this->hasMany('App\Models\Login');
    }

    /*
    |
    | ** Accesors model **
    |
    */

    public function getEncodeIDAttribute()
    {
        return \Hashids::encode($this->id);
    }




    public function getFullNameAttribute()
    {
        return title_case($this->name).' '. title_case($this->lastname);
    }




    public function getDisplayNameAttribute()
    {
        $name      = explode(' ', $this->name);
        $lastname = explode(' ', $this->lastname);

        return title_case($name[0]).' '.title_case($lastname[0]);
    }




    public function getDisplayStatusAttribute()
    {
        return $this->status == 1 ? 'Activo' : 'Denegado';
    }

    /*
    |
    | ** Mutators model **
    |
    */

    public function setPasswordAttribute($attribute)
    {
        if (! empty($attribute))
        {
           $this->attributes['password'] = strlen($attribute) < 60 ? bcrypt($attribute) : $attribute;
        }
    }

    /*
    |
    | ** Send the custom password reset notification **
    |
    */

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
