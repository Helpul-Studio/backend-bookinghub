<?php
namespace App\Interface;

use App\Http\Requests\OutletRequest;
use Illuminate\Http\Request;

interface OutletInterface {
    public function index();

    public function store(Request $request);

    public function update($id, Request $request);

    public function destroy($id);
}