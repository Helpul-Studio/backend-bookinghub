<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Seshac\Otp\Otp;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Hash;

class VerifycationController extends Controller
{
    public function sendOtp(Request $request)
    {
        $data = $request->validate([
            'email' => 'required'
        ]);

        $userEmail = User::where('email', '=', $data['email'])->first();

        try {
            if($userEmail){
                $user = $request->email;
            
                $otp = Otp::setValidity(1)->setLength(6)->setMaximumOtpsAllowed(3)->setOnlyDigits(false)->generate($user);

                $data = [
                    'data' => $otp->token
                ];


                Mail::to($user)->send(new SendOtpMail($data));


                return response()->json([
                    'data' => 'cek kode otp kamu di email jika kamu terdaftar'
                ], 200);
            } else {
                return response()->json([
                    'data' => 'email kamu tidak terdaftar'
                ], 404);
            }
        } catch (\Exception $error){
            return $error;
        }
    }

    public function verifiedEmail(Request $request)
    {
        
        $data = $request->validate([
            'otp' => 'required',
        ]);

        if($data){
            $userEmail = DB::table('otps')->select('identifier')->where('token', '=', $data['otp'])->first();
            // dd($userEmail);
            if($userEmail){
                $user = User::where('email', '=', $userEmail->identifier)->first();
                $user->markEmailAsVerified();

                $otp = DB::table('otps')->select('token')->where('token', '=', $request->otp)->delete();

                return response()->json([
                    'data' => 'email telah di verifikasi'
                ]);
            } else {
                return response()->json([
                    'message' => "Kode otpmu tidak valid"
                ], 404);
            }
        }

    }

    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'otp' => 'required',
            'password' => 'required'
        ]);
        
        if($data){
            $userEmail = DB::table('otps')->select('identifier')->where('token', '=', $data['otp'])->first();
            // dd($userEmail);
            if($userEmail){
                $user = User::where('email', '=', $userEmail->identifier)->first();
                $user->update([
                    'password' => Hash::make($data['password'])
                ]);

                $otp = DB::table('otps')->select('token')->where('token', '=', $request->otp)->delete();

                return response()->json([
                    'data' => 'Password berhasil diubah'
                ]);
            } else {
                return response()->json([
                    'message' => "Kode otpmu tidak valid"
                ], 404);
            }
        }
    }
}
