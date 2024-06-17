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
        if (session()->get('role') == 'penyewa') {
            $this->folder_view = 'tenant/';
        }
    }
    public function index()
    {
        if (session()->get('role') == 'penyewa') {
            $DataRents = $this->RentModel->join('tenant', 'rent.id_tenant = tenant.id_tenant')
                ->join("property", "rent.id_property = property.id_property")
                ->where('tenant.id_user', session()->get('id_user'))
                ->orderBy('rent.id_rent', 'DESC')
                ->findAll();

            // Mendapatkan Riwayat Payment
            foreach ($DataRents as $key => $value) {
                $DataRents[$key]['payment'] = $this->RentModel->join('payment', 'rent.id_rent = payment.id_rent')
                    ->where('rent.id_rent', $value['id_rent'])
                    ->findAll();
            }

            return view($this->folder_view . 'Rent', [
                'DataRents' => $DataRents
            ]);
        }

        // Urutkan berdasarkan ID terbesar
        $DataRents = $this->RentModel->join('tenant', 'rent.id_tenant = tenant.id_tenant')
            ->join("property", "rent.id_property = property.id_property")
            ->orderBy('rent.id_rent', 'DESC')
            ->findAll();

        // Mendapatkan Riwayat Payment
        foreach ($DataRents as $key => $value) {
            $DataRents[$key]['payment'] = $this->RentModel->join('payment', 'rent.id_rent = payment.id_rent')
                ->where('rent.id_rent', $value['id_rent'])
                ->findAll();
        }

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

        // CHECK APAKAH SEDANG MENYEWA
        $DataRents = $this->RentModel->where('id_tenant', $this->request->getPost('id_tenant'))
            ->where('status_rent', 'PENDING')
            ->orWhere('status_rent', 'BERLANGSUNG')
            ->first();
        if ($DataRents != null) {
            return redirect()->back()->withInput()->with('errors', ['status_rent' => 'Penyewa Sedang Menyewa Saat ini']);
        }

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

    public function process()
    {
        $id_rent = $this->request->getPost('id_rent');
        $id_property = $this->request->getPost('id_property');

        $this->RentModel->update($id_rent, [
            'status_rent' => 'SELESAI'
        ]);

        $this->PropertyModel->update($id_property, [
            'status_property' => 'Tersedia'
        ]);

        return redirect()->to('/rent');
    }
}
