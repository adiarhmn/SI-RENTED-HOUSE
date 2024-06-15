<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TenantController extends BaseController
{
    protected $TenantModel;
    protected $UserModel;
    public function __construct()
    {
        $this->TenantModel = new \App\Models\TenantModel();
        $this->UserModel = new \App\Models\UserModel();
    }

    public function index()
    {
        $DataTenants = $this->TenantModel->findAll();
        $DataUsers = $this->UserModel->findAll();
        return view('admin/Tenant', [
            'DataTenants' => $DataTenants,
            'DataUsers' => $DataUsers,
        ]);
    }

    public function store()
    {
        if (!$this->validate([
            'name_tenant' => 'required',
            'telp' => 'required|numeric|is_unique[tenant.telp]',
            'address' => 'required',
            'id_user' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $insertTenant = $this->TenantModel->insert([
            'name_tenant' => $this->request->getPost('name_tenant'),
            'telp' => $this->request->getPost('telp'),
            'address' => $this->request->getPost('address'),
            'id_user' => $this->request->getPost('id_user'),
        ]);

        return redirect()->to('/tenant')->with('success', 'Data Tenant Berhasil Dibuat');
    }

    public function update($id)
    {
        if (!$this->validate([
            'name_tenant' => 'required',
            'telp' => 'required|numeric',
            'address' => 'required',
            'id_user' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $updateTenant = $this->TenantModel->update($id, [
            'name_tenant' => $this->request->getPost('name_tenant'),
            'telp' => $this->request->getPost('telp'),
            'address' => $this->request->getPost('address'),
            'id_user' => $this->request->getPost('id_user'),
        ]);

        return redirect()->to('/tenant')->with('success', 'Data Tenant Berhasil Diubah');
    }

    public function destroy($id)
    {
        $deleteTenant = $this->TenantModel->delete($id);
        return redirect()->to('/tenant')->with('success', 'Data Tenant Berhasil Dihapus');
    }
}
