<?php
namespace App\Repository;

use App\Interface\OutletFasilityInterface;
use App\Models\Outlet;
use App\Models\OutletFacility;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class OutletFasilityRepository implements OutletFasilityInterface {
    public function index()
    {
        $data = Outlet::all();
        return view('outlet-fasility', [
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $storeImage = Storage::put('public/icon', $request->file('icon_outlet_facility'));
        $storeImageUrl = Storage::url($storeImage, 'public/icon');

        OutletFacility::create([
            'id_outlet' => $request->id_outlet, 
            'icon_outlet_facility' => $storeImageUrl,
            'description_outlet_facility' => $request->description_outlet_facility
        ]);

        return response()->json(['status' => true]);
    }

    public function show()
    {
        $outletFasility = OutletFacility::with('outlet')->get();

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
        if(isset($request->icon_outlet_facility)){
            File::delete(public_path($outletFasility->icon_outlet_facility));

            $storeImage = Storage::put('public/icon', $request->file('icon_outlet_facility'));
            $storeImageUrl = Storage::url($storeImage, 'public/icon');

            $outletFasility->update([
                'id_outlet' => $request->id_outlet, 
                'icon_outlet_facility' => $storeImageUrl,
                'description_outlet_facility' => $request->description_outlet_facility
            ]);

        }else{
            $outletFasility->update([
                'id_outlet' => $request->id_outlet,
                'description_outlet_facility' => $request->description_outlet_facility
            ]);
        }
        return response()->json([
            'status' => true
        ]);
    }

    public function destroy($id)
    {
        $outletFasility = OutletFacility::findOrFail($id);
        if(File::exists(public_path($outletFasility->icon_outlet_facility))){
            File::delete(public_path($outletFasility->icon_outlet_facility));
            $outletFasility->delete();
            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false]);
        }

    }
}