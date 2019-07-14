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
        $story = Story::find($this->model_id);
        $slide_ids = $story->slides()->pluck('id')->all();
        $calc_data = PerformanceData::whereIn('slide_id',$slide_ids)->take(1000)->orderBy('avg_success','desc')->groupBy('slide_id')->selectRaw('AVG(duration) as avg_duration, AVG(success) as avg_success, slide_id, count(*) as total')->get();
        $i = 0;
        foreach ($calc_data as $cd){
            $slide = Slide::find($cd->slide_id);
            $slide->order = $i;
            $slide->save();
            $i++;
        }

    }
}
