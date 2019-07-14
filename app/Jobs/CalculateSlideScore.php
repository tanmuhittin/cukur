<?php

namespace App\Jobs;

use App\Models\PerformanceData;
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

    protected $model_id;

    /**
     * CalculateSlideScore constructor.
     * @param int $model_id
     */
    public function __construct(int $model_id)
    {
        $this->model_id = $model_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        $i = 0;
        $story = Story::find($this->model_id);
        $slideIds = $story->slides()->pluck('id')->all();
        $computedData = PerformanceData::whereIn('slide_id',$slideIds)->take(1000)->orderBy('avg_success','desc')->groupBy('slide_id')->selectRaw('AVG(duration) as avg_duration, AVG(success) as avg_success, slide_id, count(*) as total')->get();
        foreach ($computedData as $data){
            $slide = Slide::find($data->slide_id);
            $slide->order = $i;
            $slide->save();
            $i++;
        }

    }
}
