<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoryPerformanceDataResource extends JsonResource
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
            'story_id' => $this->story_id,
            'visit_id' => $this->visit_id,
            'clicked_position' => $this->clicked_position,
            'clicked_at' => $this->clicked_at,
            'loaded_at' => $this->loaded_at,
            'leaved_at' => $this->leaved_at,
            'added_to_cart_at' => $this->added_to_cart_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'story' => new StoryResource($this->whenLoaded('story')),
            'visit' => new VisitResource($this->whenLoaded('visit'))
        ];
    }
}
