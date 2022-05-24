<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User as ModelsUser;

class User extends BaseController
{
    public function index()
    {
        return view('user/login');
    }
    public function register()
    {
        return view('user/register');
    }

    public function create()
    {
        $users = new ModelsUser();
        $validation = $this->validate([
            'name' => ['required'],
            'email' => ['required', 'is_unique[users.email]'],
            'password' => ['required'],
        ]);
        if (!$validation) {
            return view('user/register', ['validation' => $this->validator]);
        } else {
            $name = $this->request->getVar('name');
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $data = [
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ];
            $result = $users->save($data);
            if ($result) {
                return redirect()->to('/user/login')->with('success', 'Account Create Successfull');
            } else {
                return redirect()->to('/user/register')->with('error', 'Some problem');
            }
        }
    }

    public function login()
    {
        $users = new ModelsUser();
        $validation = $this->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if (!$validation) {
            return view('user/login', ['validation' => $this->validator]); //
        } else {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $user = $users->where('email', $email)->first();
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'user_id' => $user['user_id'],
                        'name' => $user['name'],
                    ];
                    session()->set($data);
                    return redirect()->to('/dashboard')->with('success', 'Login Successfully');
                } else {
                    return redirect()->to('/user/login')->with('error', 'Invalid Email and password ');
                }
            } else {
                return redirect()->to('/user/login')->with('error', 'Invalid Email and password ');
            }
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/user/login')->with('error', 'Logout Successfully');
    }
}
