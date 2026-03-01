<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminUserModel;

class AuthController extends BaseController
{
    public function login()
    {
        if (session('isAdmin')) {
            return redirect()->to('/admin');
        }

        if ($this->request->getMethod() === 'POST') {
            $email = (string) $this->request->getPost('email');
            $password = (string) $this->request->getPost('password');

            $user = (new AdminUserModel())->where('email', $email)->first();

            if ($user && password_verify($password, $user['password_hash'])) {
                session()->set([
                    'isAdmin' => true,
                    'adminName' => $user['name'],
                    'adminEmail' => $user['email'],
                ]);

                return redirect()->to('/admin');
            }

            return redirect()->back()->withInput()->with('error', 'Invalid credentials.');
        }

        return view('admin/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}
