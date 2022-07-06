<?php
namespace App\Repository;

use App\Interface\OutletFasilityInterface;
use App\Models\OutletFacility;
use Illuminate\Http\Request;

class OutletFasilityRepository implements OutletFasilityInterface {
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

        return response()->json(['status' => true]);
    }

    public function show()
    {
        $outletFasility = OutletFacility::all();

        return response()->json([
            'data' => $outletFasility
        ]);
    }

    public function edit($id)
    {
        $outletFasility = OutletFacility::where('id_outlet_facility', '=', $id)->first();
        return response()->json($outletFasility);
    }

    public function update($id, Request $request)
    {
        $outletFasility = OutletFacility::findOrFail($id);
        $outletFasility->update($request->all());

        return response()->json(['status' => true]);
    }

    public function destroy($id)
    {
        $outletFasility = OutletFacility::findOrFail($id);
        $outletFasility->delete();

        return response()->json(['status' => true]);
    }
}