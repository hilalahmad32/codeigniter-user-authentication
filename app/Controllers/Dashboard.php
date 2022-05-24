<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Dashboard extends BaseController
{
    public function index()
    {
        $users = new User();
        if (session()->get('user_id')) {
            $id = session()->get('user_id');
        }
        $user = $users->find($id);
        return view('dashboard', ['users' => $user]);
    }
}
