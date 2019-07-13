<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image_url' => $this->image_url,
            'description' => $this->description,
            'product_id' => $this->product_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'slides' => new SlideCollection($this->whenLoaded('slides')),
            'story_performance_data' => new StoryPerformanceDataCollection($this->whenLoaded('story_performance_data')),
            'product' => new ProductResource($this->whenLoaded('product'))
        ];
    }
}
