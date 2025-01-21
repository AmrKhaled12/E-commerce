<?php

namespace App\Classes;

use Illuminate\Auth\GenericUser;
use Illuminate\Support\Facades\Auth;

class GenerateUser{
    public static $id;
    public static $name;
    public static $phone;
    public static $imagePath;
    public static $email;
    public static $type;


    public function GenerateUserData(){
        if(Auth::check()){
            $user=Auth::user();
            self::$id = $user->id;
            self::$name = $user->name;
            self::$phone = $user->phone;
            self::$imagePath = $user->image;
            self::$email = $user->email;
            self::$type = $user->type;
            
        }
    }


    public function GetUserData(){
    
        return[
            'id' => self::$id,
            'name' =>self::$name,
            'email'=>self::$email,
            'phone'=>self::$phone,
            'image'=>self::$imagePath,
            'type'=>self::$type,

        ];
    }

}
?>