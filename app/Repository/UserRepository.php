<?php

namespace App\Repository;

use App\Http\Requests\UserRequest;
use App\Interface\UserInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface{

    public function index()
    {
        return view('user');
    }

    public function edit($id)
    {
        $user = User::where('id_user' , '=', $id)->first();
        return response()->json($user);
    }


    public function show()
    {
        $user = User::all();

        return response()->json([
            'data' => $user
        ]);

    }
    
    public function store(Request $data)
    {
        User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'gender' => $data->gender,
            'date_of_birth' => $data->date_of_birth,
            'role' => $data->role,
            'phone_number' => $data->phone_number,
            'photo_profile' => $data->photo_profile,
        ]);

        return response()->json(['status' => true]);
    }

    public function update($id, Request $request)
    {
        if($request->password){
            $user = User::findOrFail($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                'role' => $request->role,
                'phone_number' => $request->phone_number,
                'photo_profile' => $request->photo_profile,
            ]);
        }
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'role' => $request->role,
            'phone_number' => $request->phone_number,
            'photo_profile' => $request->photo_profile,
        ]);

        return response()->json(['status' => true]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['status' => true]);
    }

    public function loginOtp(Request $request)
    {
        
    }

    public function login()
    {
        
    }
}