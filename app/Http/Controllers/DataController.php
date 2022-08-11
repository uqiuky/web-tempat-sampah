<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\Data;
use App\Models\User;
use App\Models\Biodata;
use App\Models\Trash;
use App\Models\Announcement;
use App\Notifications\TrashNotif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $datetimes = date("Y-m-d H:i:s", $time);
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

        $try = Data::select('hcsr')->latest('last_update')->first();

        $sort = $try->hcsr;

        if ($sort>=85) {
            $announcement = Announcement::create([
            'title' => "Halo, Pekerja Angkut Sampah!",
            'description' => "Tempat sampah sepertinya ada yang penuh! Harap segera kosongkan sampah agar bisa digunakan lagi. Untuk melihat tempat sampah yang penuh, silahkan klik tombol di bawah ini :",
            ]);

            $dataset = User::leftJoin('biodatas', 'biodatas.user_id', '=', 'users.id')->get(['users.*', 'biodatas.*']);

            $email = $dataset->pluck('email');

            Notification::route('mail', $email)->notify(new TrashNotif($announcement));
        }

        $data = new Data();

        $data->node = $node;
        $data->hcsr = $percent;
        $data->last_update = $datetimes;

        $data->save();
        
         
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
