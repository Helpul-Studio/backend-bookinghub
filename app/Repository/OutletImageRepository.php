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
    }

    public function show()
    {
        $data = ImageOutlet::all();

        return json_encode([
            'data' => $data
        ]);
    }

    public function update($id, Request $request)
    {
        $data = ImageOutlet::findOrFail($id);
        $data->update($request->all());
    }

    public function destroy($id)
    {
        $data = ImageOutlet::findOrFail($id);
        $data->delete();
    }
}