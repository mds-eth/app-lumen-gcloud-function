<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;

    public function __construct(Users $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return $this->user::all();
    }

    public function create(Request $request)
    {
        $name = $request->input('name');
        $age = $request->input('age');
        $email = $request->input('email');

        if(empty($name) || empty($age) || empty($email)){
            return response()->json([
                'message' => 'All fields is required'
            ], 400);
        }

        $this->user::create($request->all());

        return response()->json([
            'message' => 'Successful create new user'
        ]);
    }

    public function getUser(Request $request, $id)
    {
        $user = $this->user::find($id);

        if($user){
            return response()->json($user);
        }
        
        return response()->json([
            'message' => 'User not found'
        ], 400);
    }
}
