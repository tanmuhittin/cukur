<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataReceiverRequest;
use App\Http\Requests\SlidePerformanceDataRequest;
use App\Models\SlidePerformanceData;
use App\Http\Resources\SlidePerformanceDataResource;
use App\Models\Visit;
use Illuminate\Http\Request;

class SlidePerformanceDataController extends Controller
{
    public function index()
    {
        return new SlidePerformanceDataResource(SlidePerformanceData::paginate());
    }

    public function show(SlidePerformanceData $slidePerformanceData)
    {
        return new SlidePerformanceDataResource($slidePerformanceData->load(['slide', 'visit']));
    }

    public function store(SlidePerformanceDataRequest $request)
    {
        return 1;
        $visit_id = Visit::firstOrCreate(['uuid'=>$request->get('uuid')])->id;
        $story_data = SlidePerformanceData::firstOrNew([
            'visit_id'=> $visit_id,
            'slider_id'=> $request->get('slider_id')
        ]);
        $story_data[$request->get('data_label')] = $request->get('data_value');
        return $story_data->save();
    }
}
