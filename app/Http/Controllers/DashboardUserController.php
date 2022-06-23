<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::leftJoin('biodatas', 'biodatas.user_id', '=', 'users.id')->get(['users.*', 'biodatas.*']);

        // dd($data);
        return view('users.views.index', [
            'user' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.views.register',);
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
    		'name' => 'required',
            'username' => 'required|unique:users',
    		'email' => 'required|unique:biodatas',
    		'password' => 'required',
    		'is_admin' => 'required'
    	]);

        User::create([
    		'username' => $request->username,
    		'password' => Hash::make($request->password),
    		'is_admin' => $request->is_admin
    	]);
        
        $user = User::where("username", $request->username)->first();
        
        Biodata::create([
    		'name' => $request->name,
            'email' => $request->email,
            'user_id' => $user->id
    	]);

        return redirect('/pekerja')->with('success', 'Akun baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        $data = User::join('biodatas', 'biodatas.user_id', '=', 'users.id')->where('user_id', Auth::user()->id)->firstOrFail();
        
        return view('users.views.accounts', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data = User::join('biodatas', 'biodatas.user_id', '=', 'users.id')->where('user_id', Auth::user()->id)->firstOrFail();
        
        // dd($data);

        return view('users.views.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
    		'name' => 'required',		
    		'birth_date' => 'required',
    		'gender' => 'required',
    		'address' => 'required',
    		'phone' => 'required',
    		'photo' => 'image|file|max:2048'
    	];
        $data = User::leftJoin('biodatas', 'biodatas.user_id', '=', 'users.id')->where('user_id', Auth::user()->id)->firstOrFail();

        if ($request->email != $data->email) {
            $rules['email'] = 'required|unique:biodatas';
        }
        
        if ($request->username != $data->username) {
            $rules['username'] = 'required|unique:users';
        }

        $this->validate($request, $rules);

        User::where('id', $data->id)
            ->update([
                'username' => $request->username
            ]);

        Biodata::where('user_id', $data->user_id)
            ->update([
            'name' => $request->name,
            'email' => $request->email,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone' => $request->phone
            ]);

        if ($request->file('photo')){
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            Biodata::where('user_id', $data->user_id)
            ->update([
                'photo' => $request->file('photo')->store('post-images')
            ]);
        }

        return redirect('pekerja/show')->with('success', 'Akun berhasil disunting!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $data = User::leftJoin('biodatas','users.id','=','biodatas.user_id')->where('users.id',$user);

        $biodata = Biodata::where('user_id', $user)->first();

        if ($biodata->photo) {
            Storage::delete($biodata->photo);
        }

        Biodata::where('user_id',$user)->delete();
        $data->delete();
        
        // User::destroy([$user->id]);
        
        // $user_id = User::find($user);     
        // $data = Biodata::where('user_id', $user)->first();
        

        // if ($data) {
        //     $data->delete();
        //     $user_id->delete();
        // } else {
        //     $user_id->delete();
        // }
        // $data->delete();
        // $user_id->delete();


        return redirect('/pekerja')->with('success', 'Akun berhasil dihapus!');
        // return $user;
    }
}
