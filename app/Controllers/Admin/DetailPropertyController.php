<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DetailPropertyController extends BaseController
{
    protected $PropertyModel;
    protected $DetailPropertyModel;
    public function __construct()
    {
        $this->PropertyModel = new \App\Models\PropertyModel();
        $this->DetailPropertyModel = new \App\Models\DetailPropertyModel();
    }

    public function index($id)
    {
        $Property = $this->PropertyModel->find($id);
        $DataDetailProperties = $this->DetailPropertyModel->where('id_property', $id)->findAll();

        return view('admin/DetailProperty', [
            'property' => $Property,
            'DataDetailProperties' => $DataDetailProperties
        ]);
    }

    public function store($id)
    {
        if (!$this->validate([
            'description_detail' => 'required',
            'image_detail' => 'uploaded[image_detail]|max_size[image_detail,1024]|is_image[image_detail]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $image = $this->request->getFile('image_detail');
        if ($image->getName() != '') {
            $newName = $image->getRandomName();
            $image->move('storage', $newName);
            $newName = 'storage/' . $newName;
        } else {
            $newName = 'assets/image/default.jpg';
        }

        $this->DetailPropertyModel->save([
            'description_detail' => $this->request->getPost('description_detail'),
            'image_detail' => $newName,
            'id_property' => $id,
        ]);

        return redirect()->to('/detail-property/' . $id);
    }

    public function update($id)
    {
        if (!$this->validate([
            'description_detail' => 'required',
            'image_detail' => 'max_size[image_detail,1024]|is_image[image_detail]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $DetailProperty = $this->DetailPropertyModel->find($id);
        $image = $this->request->getFile('image_detail');
        if ($image->getName() != '') {
            $newName = $image->getRandomName();
            $image->move('storage', $newName);
            $newName = 'storage/' . $newName;
            if ($DetailProperty['image_detail'] != 'assets/image/default.jpg') {
                unlink($DetailProperty['image_detail']);
            }
        } else {
            $newName = $DetailProperty['image_detail'];
        }

        $this->DetailPropertyModel->update($id, [
            'description_detail' => $this->request->getPost('description_detail'),
            'image_detail' => $newName,
        ]);

        return redirect()->to('/detail-property/' . $DetailProperty['id_property']);
    }

    public function destroy($id)
    {
        $DetailProperty = $this->DetailPropertyModel->find($id);
        if ($DetailProperty['image_detail'] != 'assets/image/default.jpg') {
            unlink($DetailProperty['image_detail']);
        }
        $this->DetailPropertyModel->delete($id);
        return redirect()->to('/detail-property/' . $DetailProperty['id_property']);
    }
}
