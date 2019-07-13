<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoryPerformanceData extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'story_id', 'visit_id', 'clicked_position', 'clicked_at', 'loaded_at', 'leaved_at', 'added_to_cart_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'clicked_position' => 'string',
        'clicked_at' => 'timestamp',
        'loaded_at' => 'timestamp',
        'leaved_at' => 'timestamp',
        'added_to_cart_at' => 'timestamp',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    /**
     * Get the Story for the StoryPerformanceData.
     */
    public function story()
    {
        return $this->belongsTo(\App\Story::class);
    }


    /**
     * Get the Visit for the StoryPerformanceData.
     */
    public function visit()
    {
        return $this->belongsTo(\App\Visit::class);
    }

}
