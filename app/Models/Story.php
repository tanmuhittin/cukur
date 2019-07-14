<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_url', 'description', 'product_id'
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
        'image_url' => 'string',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

    /**
     * Get the Slides for the Story.
     */
    public function slides()
    {
        return $this->hasMany(Slide::class)->orderBy('order');
    }


    /**
     * Get the Product for the Story.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
