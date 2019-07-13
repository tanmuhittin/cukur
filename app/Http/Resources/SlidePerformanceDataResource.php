<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SlidePerformanceDataResource extends JsonResource
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
            'slide_id' => $this->slide_id,
            'visit_id' => $this->visit_id,
            'entered_at' => $this->entered_at,
            'leaved_at' => $this->leaved_at,
            'clicked_at' => $this->clicked_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'slide' => new SlideResource($this->whenLoaded('slide')),
            'visit' => new VisitResource($this->whenLoaded('visit'))
        ];
    }
}
