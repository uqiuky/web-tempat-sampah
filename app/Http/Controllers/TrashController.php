<?php

namespace App\Http\Controllers;

use App\Models\Trash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trashes = Trash::all();
        foreach ($trashes as $trash) {
            $node_number = $trash->node_number;
            $location = $trash->location;
            $maps = $trash->maps;
            
        }
        
        $headers = [
            "X-M2M-Origin" => "1c27adf79fd221ff:db68a82a0389e67a",
            // "X-M2M-Origin: ",
            "Content-Type" => "application/json;ty=4",
            "Accept" => "application/json"
        ];
        $response = Http::withHeaders($headers)->get('https://platform.antares.id:8443/~/antares-cse/antares-id/TempatSampah1129/Lora/la');
        $body = $response->json('m2m:cin');        
        $datas = json_decode($body['con'], true);
        $time = strtotime($body['lt']);
        $datetime = date("d-M-Y H:i:s", $time);
        $date = date("d-M-Y", $time);
        $time = date("H:i:s", $time);
        $values = $datas['data'];
        $node = $values['Node'];
        $sum = $values['Cm'] - 20;
        $cm = $sum * 100/40;
        
        if ($values['Cm']>59) {
            $percent = 1;
        }elseif($values['Cm']<21) {
            $percent = 100;
        }else{
            $percent = 100 - $cm;
        }


    return view('dashboard.index',[
        "name" => "Lab TK-B 1",
        "node" => $node,
        "node_number" => $node_number,
        "cm" => $percent,
        "datetime" => $datetime,
        "date" => $date,
        "time" => $time,
        "location" => $location,
        "maps" => $maps
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trash.views.createsampah',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
    		'node_number' => 'required|unique:trashes',
            'location' => 'required',
    		'maps' => 'required'
    	]);

        Trash::create([
    		'node_number' => $request->node_number,
    		'location' => $request->location,
    		'maps' => $request->maps
    	]);

        return redirect('../../')->with('success', 'Tempat sampah baru baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trash  $trash
     * @return \Illuminate\Http\Response
     */
    public function show(Trash $trash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trash  $trash
     * @return \Illuminate\Http\Response
     */
    public function edit(Trash $trash)
    {
        
        return view('trash.views.editsampah', [
            'trash' => $trash
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trash  $trash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trash $trash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trash  $trash
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trash $trash)
    {
        //
    }
}
