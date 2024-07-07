<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoleAndPermission;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

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

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function manager()
    {
        return $this->belongsTo(User::class,'id','id');
    }

    // Define the relationship with the Manager model
    public function managers()
    {
        return $this->belongsToMany(User::class, 'manager_employee', 'user_id', 'manager_id');
    }

    // Scope to filter employees
    public function scopeEmployees($query)
    {
        return $query->where('role_id', 3);
    }

    // For Emmployee & General Users
    public function employees()
    {
        return $this->belongsToMany(User::class, 'manager_employee', 'manager_id', 'user_id')->whereIn('role_id', [3,4]);
    }

    public function relivers()
    {
        return $this->belongsToMany(Reliver::class,'reliver_user','user_id','reliver_id');
    }
}
