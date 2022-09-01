<?php

namespace App\Http\Controllers;

use App\Models\Trash;
use App\Models\Data;
use App\Models\User;
use App\Models\Biodata;
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
    public function index(Request $request)
    {
        $trashes = Trash::all();

        $nodenum = Trash::pluck('node_number');
        
        foreach ($nodenum as $nodenums) {
            if (Auth::user()->is_admin == 1) {
                $data[] = Trash::leftJoin('data', 'data.node', '=', 'trashes.node_number')->where('node_number','=',$nodenums)->latest('last_update')->first();
            }
            elseif (Auth::user()->is_admin == 0 && Auth::user()->lingkup_pantau == "Gedung Magister") {
                $data[] = Trash::leftJoin('data', 'data.node', '=', 'trashes.node_number')->where('node_number','=',$nodenums)->where('lingkup','=','Gedung Magister')->latest('last_update')->first();
                # code...
            }
            elseif (Auth::user()->is_admin == 0 && Auth::user()->lingkup_pantau == "Lab Telekomunikasi") {
                $data[] = Trash::leftJoin('data', 'data.node', '=', 'trashes.node_number')->where('node_number','=',$nodenums)->where('lingkup','=','Lab Telekomunikasi')->latest('last_update')->first();
            }
            elseif (Auth::user()->is_admin == 0 && Auth::user()->lingkup_pantau == "Gedung Sekolah B") {
                $data[] = Trash::leftJoin('data', 'data.node', '=', 'trashes.node_number')->where('node_number','=',$nodenums)->where('lingkup','=','Gedung Sekolah B')->latest('last_update')->first();
            }
            
        }
        $try = Data::select('hcsr')->latest('last_update')->first();

        $filterData = collect($data)->filter(function ($value, $key) {
            return $value != null;
        });

        // foreach ($data as $key => $value) {
        //     if (is_null($key) || !is_array($value)) {
        //         continue;
        //     }

        //     $myarray[$key] = array_filter($value);
        // }
        
        // dd(Auth::user()->lingkup_pantau);
        foreach ($filterData as $moreData) {
            $fill[] = $moreData->hcsr;
            $filltry = collect($fill)->sortDesc();
        }
        
        $sort = $filltry->values()->first();
        // $sort2 = $try->hcsr;
        $sort3 = collect($filltry)->sum();

        $totalvolume = $sort3*36000/100;
        
        $filtered = $filltry->filter(function ($value, $key) {
            return $value >= 85;
        });

        $fillfull = $filtered->count();

        $nodetotal = Data::distinct()->count('node');
        
        // $auth = User::join('biodatas', 'biodatas.user_id', '=', 'users.id')->where('user_id', Auth::user()->id)->firstOrFail();

        // $is_admin = $auth->is_admin;


    return view('dashboard.index',[
        "totalvolume" => $totalvolume,
        "fillfull" => $fillfull,
        "trash" => $filterData,
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
    		'maps' => 'required',
    		'lingkup' => 'required'
    	]);

        Trash::create([
    		'node_number' => $request->node_number,
    		'location' => $request->location,
    		'maps' => $request->maps,
    		'lingkup' => $request->lingkup
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
      
            $data = Trash::where('node_number','=',$id)->get();

            foreach ($data as $datas) {
                # code...
            }
        
        // dd($datas);
        
        return view('dashboard.editsampah', [
            'trash' => $datas
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

        // if ($request->node_number != $data->node_number) {
        //     $rules['node_number'] = 'required|unique:trashes';
        // }
        
        $this->validate($request, $rules);

        Trash::where('id', $data->id)
        ->update([
    		// 'node_number' => $request->node_number,
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
    public function destroy(Trash $trash, Request $request, $id)
    {
        $nodenum = Trash::pluck('node_number');

        foreach ($nodenum as $nodenums) {
            $data[] = Trash::leftJoin('data', 'data.node', '=', 'trashes.node_number')->where('node_number','=',$nodenums)->latest('last_update')->first();
        }
        foreach ($data as $datas) {
            $datanode = $datas->get('node_number');
        }
        // $datanods = $data->get('node_number')->toArray();
        $key = $request->url();
        $keynode =substr($key, -1);
        
        $data_id = Trash::where('node_number', '=', $keynode)->get();
        // dd($data_id);
        
        $data_id->each->delete();

        return redirect('/dashboard')->with('success', 'Sampah berhasil dihapus!');
    }
}
