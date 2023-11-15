<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class order extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $keyType = 'string';

    public $incrementing = false;

    public function orderdetails() : HasMany{
        return $this->hasMany(orderdetail::class);
    }
    
    public function customer():BelongsTo{
        return $this->belongsTo(customer::class,"customer_id","uuid");
    }
}
