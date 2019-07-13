<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VisitResource extends JsonResource
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
            'visitor_ip' => $this->visitor_ip,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'story_performance_data' => new StoryPerformanceDataCollection($this->whenLoaded('story_performance_data')),
            'slide_performance_data' => new SlidePerformanceDataCollection($this->whenLoaded('slide_performance_data'))
        ];
    }
}
