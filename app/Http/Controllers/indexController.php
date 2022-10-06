<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\school;
use App\Services\schoolService\schoolService;
use App\Services\userService\userService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class indexController extends Controller
{
    
    //
    public $index_school ;
    public $user_service ;


    public function __construct(schoolService $index_school,userService $user_service)
    {
         $this->index_school = $index_school;
         $this->user_service = $user_service;
    }
    //function pour afficher la liste des ecoles
    public function index()
    {
     return $this->index_school->index();
    }
    //function pour creer un utilisateur
    public function create_use(Request $request)
    {
        
        $var=$this->user_service->create($request);
        return $var;
    }
    // function pour reccuperer une ecole bien precise en fonction de son id
    public function find(Request $request)
    {
         $cmd=DB::table('schools')
            ->join('categories','schools.categorie_id','=', 'categories.id')
            ->where('schools.id',$request->val)
             ->select('schools.*','categories.*')
            ->first();
            return $cmd;
       
    }
    //function pour le login
    public function login(Request $request)
    {
     
                $data = [
                     'name' => $request['name'],
                     'tel' => $request['tel'],
                     'password'=>$request['password'],
                      ];

                 if (Auth::attempt($data) )
                {
                    $user = Auth::user();
                    return response()->json(['user_name' =>$user->name,], 200 );
                } 
                else 
                {
                    return response()->json( [
                        'status' => false,
                        'message' => 'The phone not connect',
                        'error' => $this->u
                    ], 401 );
                }          
    }
    //function pour la recherche d'une ecole
     public function searchSchool(Request $request){
           $var_school=$request->val;
             $school = school::where('name_school', 'LIKE', '%'.$var_school.'%')->get();
            return $school;
    }

}
