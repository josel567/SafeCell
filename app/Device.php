<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'alias', 'imei', 'brand', 'model', 'fcm_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    // Un dispositivo puede tener varios servicios.
    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('is_active');
    }

    // Un dispositivo sólo pertenece a un usuario
    public function user() {
        return $this->belongsTo(User::class);
    }
}
