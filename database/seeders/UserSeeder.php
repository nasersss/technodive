<?php

namespace Database\Seeders;

use App\Http\Controllers\Services\FromNumToTextController;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'admin',
            'username'=>"admin",
            'password' =>Hash::make('123456'),
        ]);
    }
}
