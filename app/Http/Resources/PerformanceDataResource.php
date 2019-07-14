<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PerformanceDataResource extends JsonResource
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
            'entity_type' => $this->entity_type,
            'entity_id' => $this->entity_id,
            'visit_id' => $this->visit_id,
            'action_label' => $this->action_label,
            'action_value' => $this->action_value,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'visit' => new VisitResource($this->whenLoaded('visit'))
        ];
    }
}
