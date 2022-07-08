<?php

namespace App\Repository;

use App\Interface\OutletImageInterface;
use App\Models\ImageOutlet;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OutletImageRepository implements OutletImageInterface {
    public function index()
    {
        return view('outlet-image');
    }

    public function store(Request $request)
    {
        // $image = new ImageOutlet();

        // $data = $request->all([
        //     'id_outlet',
        //     'photo_outlet'
        // ]);

        // if($data){
        //     $data['photo_outlet'] = $request->file('photo_outlet')->store('public/image', 'public');

        //     $image->id_outlet = $data['id_outlet'];
        //     $image->photo_outlet = $data['photo_outlet'];
        //     $image->save();
        // }
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
        $data = ImageOutlet::all();

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
        $data = ImageOutlet::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'status' => true
        ]);
    }

    public function destroy($id)
    {
        $data = ImageOutlet::findOrFail($id);
        $data->delete();
        return response()->json([
            'status' => true
        ]);
    }
}