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

        foreach ($nodenum as $nodenums) {
            $data = Data::where('node','=',$nodenums)->latest('last_update')->first();
        }

        $nodetotal = Data::distinct()->count('node');
        
        $data_1 = Data::where('node','=','1')->latest('last_update')->first();
        $data_2 = Data::where('node','=','2')->latest('last_update')->first();

        // $try = Trash::leftJoin('data', 'data.node', '=', 'trashes.node_number')->where('node','=',$nodenum)->get(['data.*', 'trashes.*']);

        // $data = Trash::leftJoin('data', 'data.node', '=', 'trashes.node_number')->get(['data.*', 'trashes.*']);

        // dd($nodenum);

    return view('dashboard.index',[
        "trash" => $trashes,
        "data_1" => $data_1,
        "data_2" => $data_2,
        "total" => $nodetotal
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.createsampah',);
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

        return redirect('/dashboard')->with('success', 'Tempat sampah baru baru berhasil ditambahkan!');
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
    public function edit($id)
    {
      
            $data = Trash::find($id);
        
        // dd($data);
        
        return view('dashboard.editsampah', [
            'trash' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trash  $trash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trash $trash, $id)
    {
        $rules = [
            'location' => 'required',
    		'maps' => 'required'
    	];
        $data = Trash::find($id);

        if ($request->node_number != $data->node_number) {
            $rules['node_number'] = 'required|unique:trashes';
        }
        
        $this->validate($request, $rules);

        Trash::where('id', $data->id)
        ->update([
    		'node_number' => $request->node_number,
    		'location' => $request->location,
    		'maps' => $request->maps
    	]);

        return redirect('/dashboard')->with('success', 'Data berhasil disunting!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trash  $trash
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trash $trash, $id)
    {
        $data = Trash::find($id);
        $data->delete();

        return redirect('/dashboard')->with('success', 'Sampah berhasil dihapus!');
    }
}
