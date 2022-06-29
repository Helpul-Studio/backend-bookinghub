<?php

namespace App\Repository;

use App\Http\Requests\RegisterUserRequest;
use App\Interface\UserInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface{


    public function create(Request $request)
    {

    }

    public function update($id, Request $request)
    {
        
    }

    public function show()
    {
        $user = User::all();

        return response()->json([
            'data' => $user
        ], Response::HTTP_ACCEPTED);
    }
    
    public function detail($id)
    {

    }

    public function delete($id)
    {

    }

    public function register(Request $data)
    {
        if($data){
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone_number' => $data['phone_number'],
                'role' => 'user'
            ]);
        }

        return response()->json([
            'message' => 'Berhasil mendaftar'   
        ], Response::HTTP_CREATED);
    }

    public function loginOtp(Request $request)
    {
        
    }

    public function login()
    {
        
    }
}