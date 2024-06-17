<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class RentController extends BaseController
{
    protected $RentModel;
    protected $TenantModel;
    protected $PropertyModel;
    protected $folder_view = "";
    public function __construct()
    {
        $this->RentModel = new \App\Models\RentModel();
        $this->TenantModel = new \App\Models\TenantModel();
        $this->PropertyModel = new \App\Models\PropertyModel();

        if (session()->get('role') == 'admin') {
            $this->folder_view = 'admin/';
        }
    }
    public function index()
    {
        // Urutkan berdasarkan ID terbesar
        $DataRents = $this->RentModel->join('tenant', 'rent.id_tenant = tenant.id_tenant')
            ->join("property", "rent.id_property = property.id_property")
            ->findAll();

        $DataTenants = $this->TenantModel->findAll();
        $DataProperties = $this->PropertyModel->where('status_property', 'Tersedia')->findAll();

        return view($this->folder_view . 'Rent', [
            'DataRents' => $DataRents,
            'DataTenants' => $DataTenants,
            'DataProperties' => $DataProperties
        ]);
    }

    public function store()
    {
        // dd($this->request->getPost());

        if (!$this->validate([
            'id_tenant' => 'required',
            'id_property' => 'required',
            'total_tenant' => 'required|numeric',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $Property = $this->PropertyModel->find($this->request->getPost('id_property'));

        if ($Property['status_property'] == 'Rented') {
            return redirect()->back()->withInput()->with('errors', ['status_property' => 'Kost sudah terisi penuh']);
        }

        $dataRent = [
            'id_property' => $this->request->getPost('id_property'),
            'id_tenant' => $this->request->getPost('id_tenant'),
            'total_tenant' => $this->request->getPost('total_tenant') + 1,
            'status_rent' => 'PENDING',
            'date_start' => date('Y-m-d'),
            'priceper_month' => $Property['price_property'] * ($this->request->getPost('total_tenant') + 1),
        ];

        // $DB = \Config\Database::connect();
        // $DB->transStart();
        $result = $this->RentModel->insert($dataRent);

        if ($result) {
            $this->PropertyModel->update($this->request->getPost('id_property'), [
                'status_property' => 'Rented'
            ]);
        }

        return redirect()->to('/rent');
    }
}
