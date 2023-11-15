<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class governArea extends Model
{
    use HasFactory;
    // protected $table   = "govern_areas";
    // protected $primaryKey = "uuid";

    public function govern(): BelongsTo
    {
        return $this->BelongsTo(govern::class);
    }
}
