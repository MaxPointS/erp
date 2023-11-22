<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class term extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;
    protected $guarded=[];
    public function service() : BelongsTo {
        return $this->belongsTo(service::class);
    }
    
}
