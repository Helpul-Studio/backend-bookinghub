<?php

namespace App\Repository;

use App\Interface\OutletImageInterface;
use App\Models\ImageOutlet;
use Illuminate\Http\Request;

class OutletImageRepository implements OutletImageInterface {
    public function index()
    {
        return view('outlet-image');
    }

    public function store(Request $request)
    {
        ImageOutlet::create([
            'id_outlet' => $request->id_outlet,
            'photo_outlet' => $request->photo_outlet
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