<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name',
        'email',
        'password',
        'is_admin',
    ];
    public function roleUsers(){
      return $this->belongsToMany(Role::class);
    }
    public function permissions()
    {
      return $this->hasManyThrough(Permission::class, Role::class);
    }
    public function hasPermission($routeName)
    {
      foreach ($this->roleUsers as $role) {
        if ($role->permissions()->where('name', $routeName)->exists()) {
          return true;
        }
      }

      return false;
    }
    public function userPermissionList()
    {
      // Load roles with their associated permissions
      $user = $this->load('roleUsers.permissions');

      // Extract permissions from each role
      $permissions = $user->roleUsers->flatMap(function ($role) {
        return $role->permissions;
      })->pluck('name')->unique()->toArray();

      return $permissions;
    }
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
        'password' => 'hashed',
    ];
}
