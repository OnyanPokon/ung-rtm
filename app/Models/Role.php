<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // Automatically generate slug when creating a new role
        static::creating(function ($role) {
            $role->slug = Str::slug($role->name);
        });

        // Automatically update slug when updating the role name
        static::updating(function ($role) {
            $role->slug = Str::slug($role->name);
        });
    }
}
