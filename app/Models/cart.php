<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class cart extends Model
{
    use HasFactory;

    protected $table = "cart";

    protected $guarded=[];


    public function services():HasMany{
        return $this->HasMany(service::class,"id","service_id");
    }
}
