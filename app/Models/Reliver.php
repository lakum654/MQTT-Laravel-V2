<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reliver extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function device() {
        return $this->belongsTo(Device::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'reliver_user','reliver_id','user_id');
    }

    public function setting() {
        return $this->hasOne(NotificationSetting::class, 'reliver_id', 'id');
    }
}
