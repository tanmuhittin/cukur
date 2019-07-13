<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'media_url', 'title', 'content', 'action_button'
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
        return $this->hasMany(\App\SlidePerformanceData::class);
    }

}
