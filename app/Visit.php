<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'visitor_ip'
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
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    /**
     * Get the StoryPerformanceData for the Visit.
     */
    public function storyPerformanceData()
    {
        return $this->hasMany(\App\StoryPerformanceData::class);
    }


    /**
     * Get the SlidePerformanceData for the Visit.
     */
    public function slidePerformanceData()
    {
        return $this->hasMany(\App\SlidePerformanceData::class);
    }

}