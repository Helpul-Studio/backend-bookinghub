<?php
namespace App\Repository;

use App\Http\Requests\OutletRoomRequest;
use App\Interface\OutletRoomInterface;
use App\Models\OutletRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutletRoomRepository implements OutletRoomInterface {
    public function index()
    {
        $outletRoom = OutletRoom::all();

        return response()->json([
            'message' => 'Success Get Data',
            'data' => $outletRoom
        ]);
    }

    public function store(Request $request)
    {
        $outletRoom = OutletRoom::create([
            'id_outlet' => $request->id_outlet,
            'outlet_room_number' => $request->id_outlet,
            'outlet_room_name' => $request->outlet_room_name,
            'outlet_room_status' => $request->outlet_room_status
        ]);

        return response()->json([
            'message' => 'Success Store Data',
            'data' => $outletRoom
        ]);
    }

    public function update($id, Request $request)
    {
        $outletRoom = OutletRoom::findOrFail($id);

        // $outletRoom = DB::table('outlet_rooms')->where('id_outlet_room', $id)->update($request->all());

        $outletRoom->update($request->all());
        
        return response()->json([
            'message' => 'Success Update Data',
            'data' => $outletRoom
        ]);
    }

    public function destroy($id)
    {
        $outletRoom = OutletRoom::findOrFail($id);
        $outletRoom->delete();

        return response()->json([
            'message' => 'Success Delete Data'
        ]);
    }
}