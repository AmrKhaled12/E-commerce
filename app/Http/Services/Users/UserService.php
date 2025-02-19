<?php

namespace App\Http\Services\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserService
{
    public function CreateUser(array $data){
        DB::table('users')->insert([
            'name'     =>     $data['name'],
            'password' =>     Hash::make( $data['password'] ),
            'email'    =>     $data['email'],
            'phone'    =>     $data['phone'],
        ]);
    }

}