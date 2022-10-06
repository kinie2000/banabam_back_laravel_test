<?php
namespace App\Services\schoolService;

use App\Models\school;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class schoolService
{
    //service pour afficher la liste des ecoles
    public static function index()
  
    {     
    return school::all();
    }
     

}