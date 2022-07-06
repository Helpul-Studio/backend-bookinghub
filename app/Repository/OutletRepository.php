<?php
namespace App\Repository;

use App\Http\Requests\OutletRequest;
use App\Interface\OutletInterface;
use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletRepository implements OutletInterface {
    public function index()
    {
        return view('outlet');
    }

    public function store(Request $request)
    {
        Outlet::create([
            'outlet_name' => $request->outlet_name,
            'outlet_location_latitude' => $request->outlet_location_latitude,
            'outlet_location_longitude' => $request->outlet_location_longitude,
            'opening_hours' => $request->opening_hours,
            'closing_hours' => $request->closing_hours,
            'outlet_phone' => $request->outlet_phone,
            'instagram_link' => $request->instagram_link,
            'price_outlet_per_hour' => $request->price_outlet_per_hour
        ]);
    }

    public function show()
    {
        $outlet = Outlet::all();
        // return json_encode([
        //     'data' => $outlet
        // ]);

        return response()->json([
            'data' => $outlet
        ]);
    }

    public function update($id, Request $request)
    {
        $outlet = Outlet::findOrFail($id);

        $outlet->update($request->all());
    }

    public function destroy($id)
    {
        $outlet = Outlet::findOrFail($id);

        $outlet->delete();
    }
}