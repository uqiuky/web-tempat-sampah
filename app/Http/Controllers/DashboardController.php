<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
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
        $values = $datas['data'];
        $node = $values['Node'];
        $cm = $values['Cm'] * 100/60;
        
        if ($values['Cm']<60) {
            $percent = 100 - $cm;
        } else {
            $percent = 1;
        }
        

        // dd($percent);



    return view('dashboard.index',[
        "name" => "Lab TK-B 1",
        "id" => "id",
        "node" => $node,
        "cm" => $percent,
        "time" => $datetime,
        "location" => "Laboratorium Telekomunikasi Barat - 01",
        "maps" => "maps"
    ]);
    }

    public function contoh()
    {
        $headers = [
            "X-M2M-Origin" => "aa79fe22cb9c3cde:d3700adb0471899c",
            // "X-M2M-Origin: ",
            "Content-Type" => "application/json;ty=4",
            "Accept" => "application/json"
        ];
        $response = Http::withHeaders($headers)->get('https://platform.antares.id:8443/~/antares-cse/antares-id/SampahOtomatis/hcsr_coba/la');
        $body = $response->json('m2m:cin');        
        $datas = json_decode($body['con'], true);
        $time = strtotime($body['lt']);
        $datetime = date("d-M-Y H:i:s", $time);
        $values = $datas['data'];
        $cm = $values['Cm'] * 100/60;
        $percent = 100 - $cm;


        
        // return view('example',[
        //     "cm" => $values['cm'],
        //     "location" => "Laboratorium Telekomunikasi Barat - 01"
        // ]);
    }

    // public function account()
    // {
    //     $data = User::join('biodatas', 'biodatas.user_id', '=', 'users.id')->where('user_id', Auth::user()->id)->firstOrFail();
    //     dd($data);
    //     return view('users.views.accounts', [
    //         'data' => $data
    //     ]);
    // }
}
