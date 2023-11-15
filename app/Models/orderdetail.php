<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class orderdetail extends Model
{
    use HasFactory;

    // protected $keyType = 'string';

    // public $incrementing = false;
    protected $guarded=[];


    public function orders() : BelongsTo{
        return $this->BelongsTo(order::class);
    }

    public function customer() : HasOneThrough{
        return $this->HasOneThrough(customer::class,order::class);
    }

    public function services():HasMany{
        return $this->hasMany(service::class);
    }
}
