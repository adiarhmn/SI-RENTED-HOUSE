<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new \App\Models\UserModel();
    }

    public function index()
    {
        return view('auth/Login');
    }

    public function login()
    {
        if (!$this->validate([
            'username' => 'required',
            'password' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $User = $this->UserModel->where('username', $username)->first();

        if ($User) {
            if (password_verify($password ?? "", $User['password'])) {
                session()->set('id_user', $User['id_user']);
                session()->set('username', $User['username']);
                session()->set('role', $User['role']);

                if ($User['role'] == 'admin') {
                    return redirect()->to('/dashboard');
                } else {
                    return redirect()->to('/penyewa/dashboard');
                }
            }

            return redirect()->back()->withInput()->with('errors', [
                'password' => 'Username atau Password Salah',
                'username' => 'Username atau Password Salah'
            ]);
        }

        return redirect()->back()->withInput()->with('errors', [
            'username' => 'Username atau Password Salah',
            'password' => 'Username atau Password Salah'
        ]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
