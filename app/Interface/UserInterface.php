<?php
namespace App\Interface;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

interface UserInterface {

    public function index();

    public function store(Request $request);

    public function show();

    public function edit($id);

    public function update($id, Request $request);

    public function destroy($id);
}