<?php
namespace App\Repository;

use App\Interface\OutletRoomInterface;
use App\Models\Outlet;
use App\Models\OutletRoom;
use Illuminate\Http\Request;

class OutletRoomRepository implements OutletRoomInterface {
    public function index()
    {
        $data = Outlet::all();
        return view('outlet-room', [
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        OutletRoom::create([
            'id_outlet' => $request->id_outlet,
            'outlet_room_number' => $request->id_outlet,
            'outlet_room_name' => $request->outlet_room_name,
            'outlet_room_status' => $request->outlet_room_status
        ]);

        return response()->json([
            'status' => true
        ]);
    }

    public function show()
    {
        $outletRoom = OutletRoom::with('outlet')->get();
        
        return response()->json([
            'data' => $outletRoom
        ]);
    }

    public function edit($id)
    {
        $outletRoom = OutletRoom::where('id_outlet_room', '=', $id)->first();

        return response()->json($outletRoom);
    }

    public function update($id, Request $request)
    {
        $outletRoom = OutletRoom::findOrFail($id);

        $outletRoom->update($request->all());

        return response()->json([
            'status' => true
        ]);
        
    }

    public function destroy($id)
    {
        $outletRoom = OutletRoom::findOrFail($id);
        $outletRoom->delete();

        return response()->json([
            'status' => true
        ]);
    }
}