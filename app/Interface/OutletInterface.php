<?php
namespace App\Interface;

use Illuminate\Http\Request;

interface OutletInterface {
    public function index();

    public function store(Request $request);

    public function show();

    public function update($id, Request $request);

    public function destroy($id);
}