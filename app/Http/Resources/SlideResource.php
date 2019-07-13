<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SlideResource extends JsonResource
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
            'type' => $this->type,
            'media_url' => $this->media_url,
            'title' => $this->title,
            'content' => $this->content,
            'action_button' => $this->action_button,
            'story_id' => $this->story_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'slide_performance_data' => new SlidePerformanceDataCollection($this->whenLoaded('slide_performance_data')),
            'story' => new StoryResource($this->whenLoaded('story'))
        ];
    }
}
