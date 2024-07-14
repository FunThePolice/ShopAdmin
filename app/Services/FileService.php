<?php

namespace App\Services;


use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class FileService
{

    /**
     * @throws ValidationException
     */
    public static function storeRelatedImage(array $uploadedFiles, Model $model): void
    {
        foreach ($uploadedFiles as $file) {
            $fileName = $file->hashName();
            $file->storeAs('public/images', $fileName);
            $model->images()->save((new Image())->fill(['name' => $fileName]));
        }
    }

    public static function deleteRelatedImages(Model $model): void
    {
        foreach ($model->images()->get() as $image) {
            unlink('storage/images/' . $image->name);
            $image->delete();
        }
    }

    public static function updateRelatedImage(array $uploadedFiles, Model $model): void
    {
        static::deleteRelatedImages($model);
        static::storeRelatedImage($uploadedFiles, $model);
    }
}
