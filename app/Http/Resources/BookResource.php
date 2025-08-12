<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'book_ID' => $this->id,
            'book_name' => $this->name,
            'book_price' => $this->price,
            'photo' => url('/').'/'.$this->image, // URL to the image
            'short_description' => $this->description,
            'category_name' => $this->category->name,
            'author_name' => $this->author->name,
        ];
    }
}
