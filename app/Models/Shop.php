<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imaggable');
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
