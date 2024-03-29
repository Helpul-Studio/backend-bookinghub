<?php

namespace App\Interface;

use Illuminate\Http\Request;

interface OutletImageInterface {
    public function index();

    public function store(Request $request);

    public function show();

    public function edit($id);

    public function update($id, Request $request);

    public function destroy($id);
}