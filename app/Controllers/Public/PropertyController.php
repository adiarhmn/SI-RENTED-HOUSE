<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PropertyController extends BaseController
{
    protected $PropertyModel;
    protected $DetailPropertyModel;
    public function __construct()
    {
        $this->PropertyModel = new \App\Models\PropertyModel();
        $this->DetailPropertyModel = new \App\Models\DetailPropertyModel();
    }

    public function index()
    {
        $DataProperties = $this->PropertyModel->findAll();

        foreach ($DataProperties as $key => $value) {
            $DataProperties[$key]['detail'] = $this->DetailPropertyModel->where('id_property', $value['id_property'])->findAll();
        }

        return view('tenant/Property', ['DataProperties' => $DataProperties]);
    }
}
