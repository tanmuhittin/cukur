<?php

namespace App\Jobs;

use App\Models\Slide;
use App\Models\Story;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CalculateSlideScore implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $slide;

    /**
     * CalculateSlideScore constructor.
     * @param Slide $slide
     */
    public function __construct(Slide $slide)
    {
        $this->slide = $slide;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->slide->score += 1;
        /*$slides = Story::find($this->slide->story_id)->slides;
        foreach ($slides as $slide){
            echo $slide->id;
        }*/
    }
}
