<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'media_url', 'title', 'content', 'action_button', 'story_id'
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
        'type' => 'string',
        'media_url' => 'string',
        'title' => 'string',
        'action_button' => 'string',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    /**
     * Get the SlidePerformanceData for the Slide.
     */
    public function slidePerformanceData()
    {
        return $this->hasMany(SlidePerformanceData::class);
    }


    /**
     * Get the Story for the Slide.
     */
    public function story()
    {
        return $this->belongsTo(Story::class);
    }

}
