<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlidePerformanceData extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slide_id', 'visit_id', 'entered_at', 'leaved_at', 'clicked_at'
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
        'entered_at' => 'timestamp',
        'leaved_at' => 'timestamp',
        'clicked_at' => 'timestamp',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    /**
     * Get the Slide for the SlidePerformanceData.
     */
    public function slide()
    {
        return $this->belongsTo(\App\Slide::class);
    }


    /**
     * Get the Visit for the SlidePerformanceData.
     */
    public function visit()
    {
        return $this->belongsTo(\App\Visit::class);
    }

}
