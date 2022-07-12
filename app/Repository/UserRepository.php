<?php

namespace App\Repository;

use App\Http\Requests\UserRequest;
use App\Interface\UserInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        $storeImage = Storage::put('public/profile', $data->file('photo_profile'));
        $storeImageUrl = Storage::url($storeImage, 'public/profile');
        
        User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'gender' => $data->gender,
            'date_of_birth' => $data->date_of_birth,
            'role' => $data->role,
            'phone_number' => $data->phone_number,
            'photo_profile' => $storeImageUrl,
        ]);

        return response()->json(['status' => true]);
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        if(isset($request->photo_profile)){
            File::delete(public_path($user->photo_profile));

            $storeImage = Storage::put('public/profile', $request->file('photo_profile'));
            $storeImageUrl = Storage::url($storeImage, 'public/profile');

            if($request->password){
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'gender' => $request->gender,
                    'date_of_birth' => $request->date_of_birth,
                    'role' => $request->role,
                    'phone_number' => $request->phone_number,
                    'photo_profile' => $storeImageUrl,
                ]);
            }else{
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'gender' => $request->gender,
                    'date_of_birth' => $request->date_of_birth,
                    'role' => $request->role,
                    'phone_number' => $request->phone_number,
                    'photo_profile' => $storeImageUrl,
                ]);
            }
        }else{
            if($request->password){
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'gender' => $request->gender,
                    'date_of_birth' => $request->date_of_birth,
                    'role' => $request->role,
                    'phone_number' => $request->phone_number,
                ]);
            }else{
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'gender' => $request->gender,
                    'date_of_birth' => $request->date_of_birth,
                    'role' => $request->role,
                    'phone_number' => $request->phone_number,
                ]);
            }
        }
        return response()->json([
            'status' => true
        ]);
    }

    public function destroy($id)
    {
        $outletImage = User::findOrFail($id);
        if(File::exists(public_path($outletImage->photo_profile))){
            File::delete(public_path($outletImage->photo_profile));
            $outletImage->delete();
            return response()->json(['status' => true]);
        }else{
            $outletImage->delete();
            return response()->json(['status' => false]);
        }
    }

    public function loginOtp(Request $request)
    {
        
    }

    public function login()
    {
        
    }
}