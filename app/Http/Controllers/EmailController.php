<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\Announcement;
use App\Models\User;
use App\Models\Biodata;
use App\Notifications\TrashNotif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class EmailController extends Controller
{
    public function kirim(){

        Mail::to('syauqimubarak8@gmail.com')->send(new Email());
        // return new Email();
    }

    // public function notif(){
    //     $biodata = Biodata::all();
    //     $data = [
    //         'line1' => 'Tempat sampah sepertinya ada yang penuh! Untuk melihat tempat sampah yang penuh, silahkan klik tombol di bawah ini :',
    //         'action' => 'Periksa Tempat Sampah',
    //         'line3' => 'Harap segera kosongkan sampah agar bisa digunakan lagi.'
    //     ];
    //     $biodata->each->notify(new TrashNotif($data));
    // }

    public function store(Request $request){
        $announcement = Announcement::create([
            'title' => "Halo, Pekerja Angkut Sampah!",
            'description' => "Tempat sampah sepertinya ada yang penuh! Harap segera kosongkan sampah agar bisa digunakan lagi. Untuk melihat tempat sampah yang penuh, silahkan klik tombol di bawah ini :",
        ]);

        $data = User::leftJoin('biodatas', 'biodatas.user_id', '=', 'users.id')->get(['users.*', 'biodatas.*']);

        $email = $data->pluck('email');

        Notification::route('mail', $email)->notify(new TrashNotif($announcement));

        return response()->json($announcement);
    }

}
