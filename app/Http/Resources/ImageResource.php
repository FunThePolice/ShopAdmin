<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{

    const BASE_PATH = 'storage/images/';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'url' => $this->getFullPath($this->name)
        ] ?? [];
    }

    protected function getFullPath(string $name = ''): string
    {
        return url(self::BASE_PATH . $name);
    }
}
