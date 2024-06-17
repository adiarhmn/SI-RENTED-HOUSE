<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProfileSystemController extends BaseController
{
    protected $ProfileModel;
    public function __construct()
    {
        $this->ProfileModel = new \App\Models\ProfileSystemModel();
    }
    public function index()
    {
        $DataProfile = $this->ProfileModel->findAll();
        return view('admin/ProfileSystem', ['DataProfile' => $DataProfile]);
    }

    public function update()
    {
        if (!$this->validate([
            'profil.*.content' => 'required',
        ])) {
            $errors = ['message' => "Data tidak boleh kosong"];
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $data = $this->request->getPost('profil');
        $DB = \Config\Database::connect();
        $DB->transStart();
        foreach ($data as $value) {
            $profile = $this->ProfileModel->where('title', $value['title'])->first();

            $result = $this->ProfileModel->save([
                'id_profile' => $profile['id_profile'] ?? "",
                'title' => $value['title'],
                'content' => $value['content'],
            ]);

            echo $result . '<br>';
        }

        if ($DB->transStatus() === false) {
            $DB->transRollback();
            $msg = ['message' => "Data gagal disimpan"];
            return redirect()->back()->withInput()->with('errors', $msg);
        } else {
            $DB->transCommit();
            return redirect()->back()->withInput()->with('success', "Data Berhasil Disimpan");
        }
    }
}
