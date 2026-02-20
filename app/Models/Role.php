<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }

    public function givePermission(Permission $permission): self
    {
        $this->permissions()->syncWithoutDetaching($permission);
        return $this;
    }

    public function revokePermission(Permission $permission): self
    {
        $this->permissions()->detach($permission);
        return $this;
    }

    public function syncPermissions(array $permissions): self
    {
        $this->permissions()->sync($permissions);
        return $this;
    }
}
