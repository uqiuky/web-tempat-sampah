<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Biodata;
use App\Models\Trash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BiodataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $biodata = Biodata::create([
            'name' => Str::random(10),
            'age' => Str::random(2),
            'gender' => Str::random(6),
            'phone' => Str::random(15),
            'address' => Str::random(50),
            'photo' => Str::random(20),
        ]);
    }
}
