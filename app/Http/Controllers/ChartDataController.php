<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ChartDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nodenum = Data::pluck('node')->unique();
        foreach ($nodenum as $nodenums) {
            $todayData[] = Data::select('hcsr','last_update')->where('node','=',$nodenums)->whereDate('last_update', Carbon::today())->get();
            $hourData[] = Data::select('hcsr','last_update')->where('node','=',$nodenums)->get()->groupBy(function($data){
                return Carbon::parse($data->last_update)->format('H');
            });
            $dayData[] = Data::select('hcsr','last_update')->where('node','=',$nodenums)->get()->groupBy(function($data){
                return Carbon::parse($data->last_update)->format('D');
            });
            $weekData[] = Data::select('hcsr','last_update')->where('node','=',$nodenums)->get()->groupBy(function($data){
                return Carbon::parse($data->last_update)->format('W');
            });
            $monthData[] = Data::select('hcsr','last_update')->where('node','=',$nodenums)->get()->groupBy(function($data){
                return Carbon::parse($data->last_update)->format('M');
            });
            # code...
        }
        $percent1 = Data::all()->where('node','=','1')->pluck('hcsr');
        $percent2 = Data::all()->where('node','=','2')->pluck('hcsr');
        $date1 = Data::all()->where('node','=','2')->pluck('last_update');
        $date2 = Data::all()->where('node','=','2')->pluck('last_update');
        $node = Data::pluck('hcsr')->sortBy('id');
        $date = Data::pluck('last_update')->sortBy('id');
        // $time = date('H:i:s', strtotime($date));
        // $data1 = $data->where('node','=','1');
        // $data2 = $data->where('node','=','2');
        
        $hours = [];
        $hourCount = [];

        foreach ($hourData as $hour => $values) {
            $hourValues = $values;
            $hours[] = $hour;
            $hourCount[] = count($values);
        }
        
        $days = [];
        $dayCount = [];

        foreach ($dayData as $day => $values) {
            $dayValues = $values;
            $days[] = $day;
            $dayCount[] = count($values);
        }
        
        $weeks = [];
        $weekCount = [];

        foreach ($weekData as $week => $values) {
            $weekValues = $values;
            $weeks[] = $week;
            $weekCount[] = count($values);
        }

        $months = [];
        $monthCount = [];

        foreach ($monthData as $month => $values) {
            $monthValues = $values;
            $months[] = $month;
            $monthCount[] = count($values);
        }

        // $datasatu = [];

        // foreach ($data1 as $data_1) {
        //     $datasatu['percent'][] = $data_1->hcsr;
        //     $datasatu['last_update'][] = $data_1->last_update;
        // }
        // dd($monthData);
        // json(compact('percent1','percent2','date1','date2'));
        return view('data', [
            'percent1' => $percent1,
            'percent2' => $percent2,
            'node' => $node,
            'date1' => $date1,
            'monthData' => $monthData,
            'months' => $months,
            'monthCount' => $monthCount
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        //
    }
}
