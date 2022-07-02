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
        return view('outlet-room');
    }

    public function store(Request $request)
    {
        OutletRoom::create([
            'id_outlet' => $request->id_outlet,
            'outlet_room_number' => $request->id_outlet,
            'outlet_room_name' => $request->outlet_room_name,
            'outlet_room_status' => $request->outlet_room_status
        ]);
    }

    public function show()
    {
        $outletRoom = OutletRoom::all();
        
        return json_encode([
            'data' => $outletRoom
        ]);
    }

    public function update($id, Request $request)
    {
        $outletRoom = OutletRoom::findOrFail($id);

        $outletRoom->update($request->all());
        
    }

    public function destroy($id)
    {
        $outletRoom = OutletRoom::findOrFail($id);
        $outletRoom->delete();
    }
}