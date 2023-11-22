<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class role extends Model
{
    use HasFactory;

    // protected $primaryKey= "uuid";


    public function users():HasMany{
        return $this-> hasMany(User::class);
    }

    public function permissions():HasMany{
        return $this->hasMany(permission::class);
    }
}
