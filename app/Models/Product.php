<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Product extends Model
{

    protected $table = 'products';

    protected $fillable = ['name', 'sku', 'amount', 'price'];

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imaggable');
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function getAllAttributes(): array
    {
        $result = [];
        $columns = $this->getFillable();
        $attributes = $this->getAttributes();

        foreach ($columns as $column)
        {
            if (array_key_exists($column, $attributes)) {
                $result[$column] = $attributes[$column] ?? null;
            }
        }

        return $result;
    }

}
