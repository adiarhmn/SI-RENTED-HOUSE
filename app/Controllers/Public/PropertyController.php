<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PropertyController extends BaseController
{
    protected $PropertyModel;
    protected $DetailPropertyModel;
    protected $TenantModel;
    public function __construct()
    {
        $this->PropertyModel = new \App\Models\PropertyModel();
        $this->DetailPropertyModel = new \App\Models\DetailPropertyModel();
        $this->TenantModel = new \App\Models\TenantModel();
    }

    private function checkTenant()
    {
        if (session('role') == 'penyewa') {
            $Tenant = $this->TenantModel->where('id_user', session('id_user'))->first();
            if (!$Tenant) {
                return false;
            }
        }
        return true;
    }

    public function index()
    {
        if (!$this->checkTenant()) return redirect()->to('penyewa/profile')->with('errors', ['message' => 'Lengkapi data penyewa terlebih dahulu']);

        $DataProperties = $this->PropertyModel->findAll();

        foreach ($DataProperties as $key => $value) {
            $DataProperties[$key]['detail'] = $this->DetailPropertyModel->where('id_property', $value['id_property'])->findAll();
        }

        if (session('role') == 'penyewa') {
            $DataTenant = $this->TenantModel->where('id_user', session('id_user'))->first();
            return view('tenant/Property', ['DataProperties' => $DataProperties, 'DataTenant' => $DataTenant]);
        }
        if (session('role') == 'admin') {
            return view('admin/Property', ['DataProperties' => $DataProperties]);
        }
    }
}
