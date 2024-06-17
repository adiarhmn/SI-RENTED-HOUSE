<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PaymentController extends BaseController
{
    protected $PaymentModel;
    protected $RentModel;
    public function __construct()
    {
        $this->PaymentModel = new \App\Models\PaymentModel();
        $this->RentModel = new \App\Models\RentModel();
    }

    public function index()
    {

        $DataPayments = $this->PaymentModel->join('rent', 'payment.id_rent = rent.id_rent')
            ->join('tenant', 'rent.id_tenant = tenant.id_tenant')
            ->join('property', 'rent.id_property = property.id_property')
            ->findAll();
        $DataRents = $this->RentModel->join('tenant', 'rent.id_tenant = tenant.id_tenant')
            ->join("property", "rent.id_property = property.id_property")
            ->findAll();

        return view('admin/Payment', [
            'DataPayments' => $DataPayments,
            'DataRents' => $DataRents
        ]);
    }

    public function store()
    {
        if (!$this->validate([
            'evidence_payment' => 'uploaded[evidence_payment]|max_size[evidence_payment,1024]|is_image[evidence_payment]',
            'id_rent' => 'required',
            'method_payment' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $image = $this->request->getFile('evidence_payment');
        if ($image->getName() != '') {
            $newName = $image->getRandomName();
            $image->move('storage', $newName);
            $newName = 'storage/' . $newName;
        } else {
            $newName = 'assets/image/default.jpg';
        }

        $DataRent = $this->RentModel->find($this->request->getPost('id_rent'));

        $this->PaymentModel->save([
            'id_rent' => $this->request->getPost('id_rent'),
            'method_payment' => $this->request->getPost('method_payment'),
            'total_payment' => $DataRent['priceper_month'],
            'payment_status' => 'Pending',
            'evidence_payment' => $newName,
        ]);

        return redirect()->to('/payment')->with('success', 'Pembayaran Berhasil Ditambahkan');
    }

    public function process()
    {
        $DataPayment = $this->PaymentModel->find($this->request->getPost('id_payment'));
        $DataRent    = $this->RentModel->find($DataPayment['id_rent']);

        if ($this->request->getPost('payment_status') == 'Cancel') {
            $result = $this->PaymentModel->update($this->request->getPost('id_payment'), [
                'payment_status' => $this->request->getPost('payment_status'),
            ]);
            if ($result) {
                return redirect()->to('/payment')->with('success', 'Pembayaran Berhasil Dibatalkan');
            }
            return redirect()->to('/payment')->with('error', 'Pembayaran Gagal Dibatalkan');
        }

        $DB = \Config\Database::connect();
        $DB->transStart();

        $Plus_Day = 30;
        // 30 Hari dari Tanggal Mulai
        if ($DataRent['date_end'] == null) {
            $date_end = date('Y-m-d', strtotime($DataRent['date_start'] . ' + ' . $Plus_Day . ' days'));
        } else {
            $date_end = date('Y-m-d', strtotime($DataRent['date_end'] . ' + ' . $Plus_Day . ' days'));
        }

        // Update Day Rent
        $result01 = $this->RentModel->update($DataPayment['id_rent'], [
            'date_end' => $date_end,
            'status_rent' => 'BERLANGSUNG',
            'total_days' => $DataRent['total_days'] + $Plus_Day,
        ]);

        $result02 = $this->PaymentModel->update($this->request->getPost('id_payment'), [
            'payment_status' => $this->request->getPost('payment_status'),
        ]);

        if ($result01 && $result02) {
            $DB->transCommit();
            return redirect()->to('/payment')->with('success', 'Pembayaran Berhasil Diproses');
        }

        $DB->transRollback();
        return redirect()->to('/payment')->with('error', 'Pembayaran Gagal Diproses');
    }
}
