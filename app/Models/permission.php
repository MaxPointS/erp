<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class permission extends Model
{
    use HasFactory;

    public function roles() : BelongsToMany {
        return $this->BelongsToMany(role::class,RolePermission::class);
    }
    public function users() : BelongsToMany {
        return $this->BelongsToMany(user::class,RolePermission::class);
    }
    
}
