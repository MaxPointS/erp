<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class govern extends Model
{
    use HasFactory;

    // protected $primaryKey="uuid";
    // public $incrementing = false;
    protected $keyType = 'string';

    public function govern_areas():HasMany{
        return $this->hasMany(governArea::class);
    }
}
