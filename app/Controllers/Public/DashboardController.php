<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    protected $ProfileModel;
    public function __construct()
    {
        $this->ProfileModel = new \App\Models\ProfileSystemModel();
    }
    public function index()
    {
        $data = [
            'slogan' => $this->ProfileModel->where('title', 'slogan')->first()['content'] ?? "",
            'address' => $this->ProfileModel->where('title', 'address')->first()['content'] ?? "",
            'about' => $this->ProfileModel->where('title', 'about')->first()['content'] ?? "",
            'telp' => $this->ProfileModel->where('title', 'telp')->first()['content'] ?? "",
            'email' => $this->ProfileModel->where('title', 'email')->first()['content'] ?? "",
            'instagram' => $this->ProfileModel->where('title', 'instagram')->first()['content'] ?? "",
            'facebook' => $this->ProfileModel->where('title', 'facebook')->first()['content'] ?? "",
        ];

        return view('LandingPage', $data);
    }

    public function DashboardTenant()
    {
        return view('tenant/Dashboard');
    }
}
