<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class company extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    // public $incrementing = false;

    protected $fillable = [
        "uuid",
        "name",
        "image", 
        "arname",
        "address",
        "araddress",
        "companyservicetype_id" ,
        "location" ,
        "tel" ,
        "araddress",
    ];

    // protected $primaryKey = "uuid";
    // protected $primaryKey = "uuid";



    public function  companyservicetype():BelongsTo{
        return $this->belongsTo(companyservicetype::class);
    }

    public function  services():HasMany{
        return $this->HasMany(service::class);
    }


}
