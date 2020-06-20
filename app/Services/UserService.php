<?php 

namespace App\Services;

use App\User;
use Hash;

class UserService 
{
    public function index()
    {
        $users = User::all();

        return $users;
    }

    public function update($data, $data_)
    {
        $data['password'] = ($data['password']) ? Hash::make($data['password']) : $data_->password;

        $user = $data_->update($data);

        return $user;
    }

    public function destroy($data_)
    {
        $user = $data_->delete();

        return $user;
    }
}