<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Outlet;
use App\Models\SnapMidtrans;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id_user;
        $booking = Booking::with('snapMidtrans', 'outlet')->where('id_user', '=', $user)->get();
        return response()->json([
            'data' => $booking
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_outlet' => 'required',
            'days' => 'required'
        ]);
        // 'date_of_birth' => Carbon::parse($request['date_of_birth'])->format('Y/m/d'),
        $user = Auth::user()->id_user;
        $userData = User::where('id_user', '=', $user)->first();
        $outlet = Outlet::where('id_outlet', '=', $data['id_outlet'])->first();
        $transactionCode = rand(10, 1000);

        if($data){
            $booking = Booking::create([
                'order_id' => 'ORDER'.$transactionCode.$user,
                'id_user' => $user,
                'id_outlet' => $data['id_outlet'],
                'total_payment' => $outlet->price_outlet_per_hour,
                'days' => Carbon::parse($request['days'])->format('Y/m/d'),
                'status' => 'pending'
            ]);

            // dijalankan setelah checkout

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = 'SB-Mid-server-dQCoHuUjA-s3XxsJFNksv3xU';
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $midtrans_params = [
                'transaction_details' => [
                    'order_id' => $booking->order_id,
                    'gross_amount' => $outlet->price_outlet_per_hour
                ],
                'customer_details' => [
                    'email' => $userData->email,
                ],
            ];

            // dd($midtrans_params);

            try {
                $snapToken = \Midtrans\Snap::createTransaction($midtrans_params);
                SnapMidtrans::create([
                    'id_booking' => $booking->id_booking,
                    'snap_token' => $snapToken->token,
                    'redirect_url' => $snapToken->redirect_url
                ]);

                return response()->json([
                    'data' => $transactionCode
                ]);

            } catch (\Exception $e) {
                dd($e);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::with('snapMidtrans', 'outlet')->where('id_booking', '=', $id)->first();
        return response()->json([
            'data' => $booking
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
