<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('LandingPage');
    }

    public function DashboardTenant()
    {
        return view('tenant/Dashboard');
    }
}
