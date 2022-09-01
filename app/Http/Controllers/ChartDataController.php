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
        $dt = Carbon::now();
        $datenow = $dt->toDateString();
        // $weekly = $dt->subDays(7);
        // $nodenum = Data::pluck('node')->unique();
        // foreach ($nodenum as $nodenums) {
        //     $todayData[] = Data::select('node','node','hcsr','last_update')->where('node','=',$nodenums)->whereDate('last_update', Carbon::today())->get();
        //     $hourData[] = Data::select('node','hcsr','last_update')->where('node','=',$nodenums)->get()->groupBy(function($data){
        //         return Carbon::parse($data->last_update)->format('H');
        //     });
        //     $dayData[] = Data::select('node','hcsr','last_update')->where('node','=',$nodenums)->get()->groupBy(function($data){
        //         return Carbon::parse($data->last_update)->format('D');
        //     });
        //     $weekData[] = Data::select('node','hcsr','last_update')->where('node','=',$nodenums)->get()->groupBy(function($data){
        //         return Carbon::parse($data->last_update)->format('W');
        //     });
        //     $monthData[] = Data::select('node','hcsr','last_update')->where('node','=',$nodenums)->get()->groupBy(function($data){
        //         return Carbon::parse($data->last_update)->format('M');
        //     });
        //     # code...
        // }
        // $percent1 = Data::all()->where('node','=','1')->pluck('hcsr');
        // $percent2 = Data::all()->where('node','=','2')->pluck('hcsr');
        // $date1 = Data::all()->where('node','=','1')->pluck('last_update')->map(function ($order) {
        //     return substr($order, 0, 10);
        // })->unique();
        // $date2 = Data::all()->where('node','=','2')->pluck('last_update')->map(function ($order) {
        //     return substr($order, 0, 10); // Return only the first ten characters.
        // })->unique();
        // $node = Data::pluck('hcsr')->sortBy('id');
        // $date = Data::pluck('last_update')->sortBy('id');
        // $time = date('H:i:s', strtotime($date));
        // $data1 = $data->where('node','=','1');
        // $data2 = $data->where('node','=','2');
        // $todayData1 = Data::where('node','=','1')->whereDate('last_update', Carbon::today())->pluck('hcsr');
        // $todayData2 = Data::where('node','=','2')->whereDate('last_update', Carbon::today())->pluck('hcsr');
        // $todayDate1 = Data::where('node','=','1')->whereDate('last_update', Carbon::today())->pluck('last_update');
        // $todayDate2 = Data::where('node','=','2')->whereDate('last_update', Carbon::today())->pluck('last_update');
        // $yesterdayData1 = Data::where('node','=','1')->whereDate('last_update', Carbon::yesterday())->pluck('hcsr');
        // $yesterdayData2 = Data::where('node','=','2')->whereDate('last_update', Carbon::yesterday())->pluck('hcsr');
        // $yesterdayDate1 = Data::where('node','=','1')->whereDate('last_update', Carbon::yesterday())->pluck('last_update');
        // $yesterdayDate2 = Data::where('node','=','2')->whereDate('last_update', Carbon::yesterday())->pluck('last_update');
        $weekData1 = Data::select('node','hcsr','last_update')->where('node','=','1')->where('last_update', '>=', Carbon::today()->subDays(7))->get()->groupBy(function ($dataWeek) {
            return Carbon::parse($dataWeek->last_update)->format('d M Y');
        });
        $avgday1 = [];
        foreach ($weekData1 as $weekDatas1) {
            $avgday1[] = $weekDatas1->avg('hcsr');
            $allday1[] = $weekDatas1->pluck('last_update')->map(function ($order) {
                return substr($order, 0, 10);
            })->unique();
        }
        
        $day1pick = [];
        // dd($weekData1);
        
        foreach ($allday1 as $day1fix) {
            $day1pick[] = $day1fix[0];
        }
        
        $weekData2 = Data::select('node','hcsr','last_update')->where('node','=','2')->get()->groupBy(function ($dataWeek) {
            return Carbon::parse($dataWeek->last_update)->format('d M Y');
        });
        $avgday2 = [];
        foreach ($weekData2 as $weekDatas2) {
            $avgday2[] = $weekDatas2->avg('hcsr');
            $allday2[] = $weekDatas2->pluck('last_update')->map(function ($order) {
                return substr($order, 0, 10);
            })->unique();
        }

        $day2pick = [];

        foreach ($allday2 as $day2fix) {
            $day2pick[] = $day2fix[0];
        }
        
        return view('data', [
            'datenow' => $datenow,
            'avgday1' => $avgday1,
            'avgday2' => $avgday2,
            'day1pick' => $day1pick,
            'day2pick' => $day2pick,

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
