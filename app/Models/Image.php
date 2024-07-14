<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{

    protected $table = "images";

    protected $guarded = ['id'];

    public function imaggable(): MorphTo
    {
        return $this->morphTo();
    }

}
