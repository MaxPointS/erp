<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class company extends Model
{
    use HasFactory;

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
    protected $primaryKey = "uuid";

    protected $keyType = 'string';

    public $incrementing = false;

    public function  companyservicetype():BelongsTo{
        return $this->belongsTo(companyservicetype::class,"companyservicetype_id","uuid");
    }

    public function  services():HasMany{
        return $this->HasMany(service::class,"company_id","uuid");
    }


}
