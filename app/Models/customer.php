<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class customer extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $keyType = 'string';

    public function orders() : HasMany{
        return $this->hasMany(order::class);
    }

   
}
 