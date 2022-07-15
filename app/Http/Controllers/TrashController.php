<?php

namespace App\Http\Controllers;

use App\Models\Trash;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $nodenum = Trash::pluck('node_number');

        // foreach ($trashes as $trash) {
        //     $node_number = $trash->node_number;
        //     $location = $trash->location;
        //     $maps = $trash->maps;
            
        // }
        

        $data_1 = Data::where('node','=','1')->latest('last_update')->first();
        $data_2 = Data::where('node','=','2')->latest('last_update')->first();

        // $try = Trash::leftJoin('data', 'data.node', '=', 'trashes.node_number')->where('node','=',$nodenum)->get(['data.*', 'trashes.*']);

        // $data = Trash::leftJoin('data', 'data.node', '=', 'trashes.node_number')->get(['data.*', 'trashes.*']);

        // dd($trashes);

    return view('dashboard.index',[
        "trash" => $trashes,
        "data_1" => $data_1,
        "data_2" => $data_2,
        "total" => $nodenum
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

        return redirect('/')->with('success', 'Tempat sampah baru baru berhasil ditambahkan!');
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
