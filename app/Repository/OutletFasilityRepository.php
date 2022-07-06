<?php
namespace App\Repository;

use App\Http\Requests\OutletRequest;
use App\Interface\OutletInterface;
use App\Models\Outlet;
use App\Models\OutletFacility;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class OutletFasilityRepository implements OutletInterface {
    public function index()
    {
        return view('outlet-fasility');
    }

    public function store(Request $request)
    {
        OutletFacility::create([
            'id_outlet' => $request->id_outlet, 
            'icon_outlet_facility' => $request->icon_outlet_facility, 
            'description_outlet_facility' => $request->description_outlet_facility
        ]);
    }

    public function show()
    {
        $outletFasility = OutletFacility::all();

        // return json_encode([
        //     'data' => $outletFasility
        // ]);

        return response()->json([
            'data' => $outletFasility
        ]);
    }

    public function update($id, Request $request)
    {
        $outletFasility = OutletFacility::findOrFail($id);
        $outletFasility->update($request->all());
    }

    public function destroy($id)
    {
        $outletFasility = OutletFacility::findOrFail($id);
        $outletFasility->delete();
    }
}