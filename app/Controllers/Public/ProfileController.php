<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProfileController extends BaseController
{
    protected $UserModel;
    protected $TenantModel;
    public function __construct()
    {
        $this->UserModel = new \App\Models\UserModel();
        $this->TenantModel = new \App\Models\TenantModel();
    }

    public function index()
    {
        $User = $this->UserModel->where('id_user', session()->get('id_user'))->first();
        $Tenant = $this->TenantModel->where('id_user', $User['id_user'])->first();
        return view('tenant/Profile', [
            'DataUser' => $User,
            'DataTenant' => $Tenant
        ]);
    }

    public function update()
    {
        if (!$this->validate([
            'name_tenant' => 'required',
            'telp' => 'required|numeric',
            'address' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $Tenant = $this->TenantModel->where('id_user', session()->get('id_user'))->first();

        $this->TenantModel->save([
            'id_tenant' => $Tenant['id_tenant'] ?? "",
            'name_tenant' => $this->request->getPost('name_tenant'),
            'telp' => $this->request->getPost('telp'),
            'address' => $this->request->getPost('address'),
            'id_user' => session()->get('id_user'),
        ]);

        return redirect()->to('penyewa/profile')->with('success', 'Data berhasil diubah');
    }

    public function changePassword()
    {
        if (!$this->validate([
            'password' => 'required',
            'newpassword' => 'required',
            'renewpassword' => 'required|matches[newpassword]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors())->with('active_tab', true);
        }

        $User = $this->UserModel->where('id_user', session()->get('id_user'))->first();

        if (!password_verify($this->request->getPost('password') ?? "", $User['password'])) {
            return redirect()->back()->withInput()->with('errors', ['Password lama tidak sesuai'])->with('active_tab', true);
        }

        $this->UserModel->save([
            'id_user' => $User['id_user'],
            'password' => password_hash($this->request->getPost('newpassword') ?? "", PASSWORD_DEFAULT),
        ]);

        return redirect()->to('penyewa/profile')->with('success', 'Password berhasil diubah')->with('active_tab', true);
    }
}
