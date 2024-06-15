<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new \App\Models\UserModel();
    }

    public function index()
    {
        $DataUsers = $this->UserModel->findAll();
        return view('admin/User', [
            'DataUsers' => $DataUsers,
        ]);
    }

    public function store()
    {
        if (!$this->validate([
            'username' => 'required|is_unique[user.username]|alpha_numeric',
            'password' => 'required|min_length[8]',
            'role' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $insertUser = $this->UserModel->insert([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password') ?? "", PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role'),
        ]);

        return redirect()->to('/user')->with('success', 'Data User Berhasil Dibuat');
    }

    public function update($id)
    {
        if (!$this->validate([
            'username' => 'required|alpha_numeric',
            'password' => 'permit_empty|min_length[8]', // Remove 'required' validation
            'role' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if ($this->request->getPost('password')) {
            $updateUser = $this->UserModel->update($id, [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password') ?? "", PASSWORD_DEFAULT),
                'role' => $this->request->getPost('role'),
            ]);
            return redirect()->to('/user')->with('success', 'Data User Berhasil Diubah');
        }

        $updateUser = $this->UserModel->update($id, [
            'username' => $this->request->getPost('username'),
            'role' => $this->request->getPost('role'),
        ]);

        return redirect()->to('/user')->with('success', 'Data User Berhasil Diubah');
    }

    public function destroy($id)
    {
        $deleteUser = $this->UserModel->delete($id);
        return redirect()->to('/user')->with('success', 'Data User Berhasil Dihapus');
    }
}
