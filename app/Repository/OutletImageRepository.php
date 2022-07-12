<?php

namespace App\Repository;

use App\Interface\OutletImageInterface;
use App\Models\ImageOutlet;
use App\Models\Outlet;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class OutletImageRepository implements OutletImageInterface {
    public function index()
    {
        $data = Outlet::all();
        return view('outlet-image', [
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $storeImage = Storage::put('public/image', $request->file('photo_outlet'));
        $storeImageUrl = Storage::url($storeImage, 'public/image');

        ImageOutlet::create([
            'id_outlet' => $request->id_outlet,
            'photo_outlet' => $storeImageUrl
        ]);

        return response()->json([
            'status' => true
        ]);
    }

    public function show()
    {

        $data = ImageOutlet::with('outlet')->get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function edit($id)
    {
        $data = ImageOutlet::where('id_image_outlet', '=', $id)->first();
        return response()->json($data);
    }

    public function update($id, Request $request)
    {
        $outletImage = ImageOutlet::findOrFail($id);
        if(isset($request->photo_outlet)){
            File::delete(public_path($outletImage->photo_outlet));

            $storeImage = Storage::put('public/image', $request->file('photo_outlet'));
            $storeImageUrl = Storage::url($storeImage, 'public/icon');

            $outletImage->update([
                'id_outlet' => $request->id_outlet, 
                'photo_outlet' => $storeImageUrl,
                'description_outlet_facility' => $request->description_outlet_facility
            ]);

        }else{
            $outletImage->update([
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
        $outletImage = ImageOutlet::findOrFail($id);
        if(File::exists(public_path($outletImage->photo_outlet))){
            File::delete(public_path($outletImage->photo_outlet));
            $outletImage->delete();
            return response()->json(['status' => true]);
        }else{
            return response()->json(['status' => false]);
        }
    }
}