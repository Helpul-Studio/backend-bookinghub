<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;
use Seshac\Otp\Otp;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if($user->hasVerifiedEmail()){
            if(!$user){
                return response()->json([
                    'message' => 'Email salah'
                ], Response::HTTP_BAD_REQUEST);
            } else if ($user->role == 'admin'){
                return response()->json([
                    'message' => 'anda bukan pelanggan'
                ]);
            }
    
            $token = $user->createToken('auth_token')->plainTextToken;
    
            return response()->json([
                'message' => 'Berhasil login',
                'token' => $token
            ], Response::HTTP_ACCEPTED);
        } else {
            return response()->json([
                'message' => 'Email tidak valid / belum terverifikasi'
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterUserRequest $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);


        if($request){
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => 'user'
            ]);
        }

        $otp = Otp::setValidity(1)->setLength(6)->setMaximumOtpsAllowed(3)->setOnlyDigits(false)->generate($validation['email']);

        $data = [
            'data' => $otp->token
        ];


        Mail::to($validation['email'])->send(new SendOtpMail($data));

        return response()->json([
            'message' => 'Berhasil Mendaftar silahkan masukkan otp untuk verifikasi'
        ], Response::HTTP_CREATED);

        return response()->json([
            'message' => 'Berhasil mendaftar'
        ],Response::HTTP_OK);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user()->id_user;
        $dataUser = User::where('id_user', '=', $user)->get();
        return response()->json([
            'data' => $dataUser
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegisterUserRequest $request)
    {
        $user = Auth::user()->id_user;

        $userData = User::where('id_user', '=', $user)->first();

        if(isset($request['password'])){
            $userData->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $request['password'],
                'gender' => $request['gender'],
                'date_of_birth' => Carbon::parse($request['date_of_birth'])->format('Y/m/d'),
            ]);
            return response()->json([
                'message' => 'Data profil berhasil diubah'
            ], Response::HTTP_ACCEPTED);
        } else {
            $userData->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'gender' => $request['gender'],
                'date_of_birth' => Carbon::parse($request['date_of_birth'])->format('Y/m/d'),
            ]);
            return response()->json([
                'message' => 'Data profil berhasil diubah'
            ], Response::HTTP_ACCEPTED);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json([
            'message' => 'berhasil logout'
        ]);
    }

    public function forgotPassword(Request $request)
    {
        $data = $request->validate([
            'email' => 'required'
        ]);

        $validUser = User::where('email', '=', $data['email'])->first();
        if(!$validUser){
            return response()->json([
                'message' => 'Email kamu tidak terdaftar'
            ], Response::HTTP_OK); 
        }


    }
}
