<?php

namespace App\Interface;

use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\Request;


interface UserInterface {
    
    public function create(Request $request);

    public function update($id , Request $request);

    public function show();

    public function detail($id);

    public function delete($id);

    public function register(RegisterUserRequest $request);

    public function loginOtp(Request $request);

}