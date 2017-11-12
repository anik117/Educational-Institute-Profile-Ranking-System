<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Mail;
// use Illuminate\Auth\Passwords\TokenRepositoryInterfac;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        if($value){
            $this->attributes['password']= app('hash')->needsRehash($value)?Hash::make($value):$value;
        }
    }
    // public static function generatePassword()
    // {
    //   // Generate random string and encrypt it. 
    //   return bcrypt(str_random(35));
    // }

    public static function sendWelcomeEmail($user)
    {
      // Generate a new reset password token
      $token = app('auth.password.broker')->createToken($user);
      
      // Send email
      Mail::send('emails.welcome', ['user' => $user, 'token' => $token], function ($m) use ($user) {
        $m->from('schoolrankingbd@gmail.com', 'School Ranking BD');
        $m->to($user->email, $user->name)->subject('Welcome to the system');
      });
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }
    // public function roles()
    // {
    //   return $this
    //     ->belongsToMany('App\Role')
    //     ->withTimestamps();
    // }

    // public function authorizeRoles($roles)
    // {
    //   if ($this->hasAnyRole($roles)) {
    //     return true;
    //   }
    //   abort(401, 'This action is unauthorized.');
    // }

    // public function hasAnyRole($roles)
    // {
    //   if (is_array($roles)) {
    //     foreach ($roles as $role) {
    //       if ($this->hasRole($role)) {
    //         return true;
    //       }
    //     }
    //   } else {
    //     if ($this->hasRole($roles)) {
    //       return true;
    //     }
    //   }
    //   return false;
    // }

    // public function hasRole($role)
    // {
    //   if ($this->roles()->where('name', $role)->first()) {
    //     return true;
    //   }
    //   return false;
    // }
}
