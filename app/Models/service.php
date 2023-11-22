<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class service extends Model
{
    use HasFactory;

//    protected $fillable = [
//         "uuid",
//         // "company" => $request->company,
//         "company_id",
//         "image" ,
//         "arname" ,
//         "name" ,
//         "ardescription" ,
//         "description" ,
//         "priceBefore",
//         "price",
//    ];

   protected $garded = [];
    // protected $primaryKey = "uuid";

    protected $keyType = 'string';

    public $incrementing = false;

    public function  company():BelongsTo{
        return $this->belongsTo(company::class);
    }

    public function  cart():BelongsToMany{
        return $this->BelongsToMany(cart::class);
    }

    public function  terms():HasMany{
        return $this->HasMany(term::class);
    }

public function orders():HasManyThrough{
    return $this->hasManyThrough(orderdetail::class,order::class);
}

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->uuid = (string) Str::uuid();
    //     });
    // }
}
