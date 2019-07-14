<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerformanceData extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slide_id', 'visit_id', 'duration', 'success'
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
     * Get the Visit for the PerformanceData.
     */
    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }

}
