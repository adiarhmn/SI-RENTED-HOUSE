<?php

namespace App\Controllers\Admin;

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

        return view('admin/Property', ['DataProperties' => $DataProperties]);
    }

    public function store()
    {
        if (!$this->validate([
            'name_property' => 'required|is_unique[property.name_property]',
            'price_property' => 'required|numeric',
            'status_property' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->PropertyModel->save([
            'name_property' => $this->request->getPost('name_property'),
            'price_property' => $this->request->getPost('price_property'),
            'status_property' => $this->request->getPost('status_property'),
        ]);

        return redirect()->to('/property');
    }

    public function update($id)
    {
        if (!$this->validate([
            'name_property' => 'required|is_unique[property.name_property,id_property,' . $id . ']',
            'price_property' => 'required|numeric',
            'status_property' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->PropertyModel->update($id, [
            'name_property' => $this->request->getPost('name_property'),
            'price_property' => $this->request->getPost('price_property'),
            'status_property' => $this->request->getPost('status_property'),
        ]);

        return redirect()->to('/property');
    }

    public function destroy($id)
    {
        $this->PropertyModel->delete($id);
        return redirect()->to('/property');
    }
}
