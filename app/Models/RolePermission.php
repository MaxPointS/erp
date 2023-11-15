<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RolePermission extends Pivot
{
    //

    protected $table="role_Permissions";

    public function roles():HasMany{
        return $this-> HasMany(role::class);
    }

    public function users():HasMany{
        return $this-> HasMany(users::class);
    }

    public function permissions():HasMany{
        return $this-> HasMany(permission::class);
    }

}
