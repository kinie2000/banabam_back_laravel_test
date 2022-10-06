<?php
namespace App\Services\userService;

use App\Models\school;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class userService
{
    //service pour creer un utilisateur
    public static function create($data)
  
    {     
    return User::create([
            'name' => $data ['name'],
            'prenom' => $data['prenom'],
            'tel' => $data['tel'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
        ]);
    }

    

}