<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Produc::class, 'user_products');
    }

    public function product_relation()
    {
        return $this->belongsTo(User_product::class, 'user_id', 'id');
    }

    /**
     * Roll API Key
     */
    public function rollApiKey(){
        do {
            $this->api_token = Str::random(80);
        } while($this->where('api_token', $this->api_token)->exists());

        $this->save();
    }
}
