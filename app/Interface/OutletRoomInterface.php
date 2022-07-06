<?php
namespace App\Interface;

use App\Http\Requests\OutletRoomRequest;
use Illuminate\Http\Request;

interface OutletRoomInterface {
    public function index();
    
    public function store(Request $request);

    public function show();

    public function update($id, Request $request);

    public function destroy($id);
}
