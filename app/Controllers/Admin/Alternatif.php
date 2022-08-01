<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Crud_model;

class Alternatif extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->form_validation = \Config\Services::validation();
        $this->crud = new Crud_model();
    }

    public function index()
    {
        $data['title'] = "Kelola Alternatif - SPK Traknus";
        $data['content_header'] = "Kelola Alternatif";
        $data['alternatif'] = $this->crud->read_data_all("tb_alternatif");
        return view('Admin/Content/Alternatif', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Alternatif - SPK Traknus";
        $data['content_header'] = "Tambah Data Alternatif";
        $data['form_validation'] = $this->form_validation;
        return view('Admin/Content/Add_alternatif', $data);
    }

    public function store()
    {
        $nama_alternatif = $this->request->getPost('nama_alternatif');

        $data = [
            'nama_alternatif' => $nama_alternatif,
        ];

        if ($this->form_validation->run($data, 'input_alternatif') == FALSE) {
            session()->set("f_i_alternatif", "gagal");
            return redirect()->to('/alternatif/add')->withInput();
        } else {
            $this->crud->save_data_input('tb_alternatif', $data);
            session()->set("s_i_alternatif", "sukses");
            return redirect()->to('/alternatif');
        }
    }

    public function edit($id)
    {
        $data['alternatif'] = $this->crud->read_data_all_where1("tb_alternatif", true, "id", $id);
        $data['title'] = "Edit Alternatif - SPK Traknus";
        $data['content_header'] = "Edit Data Alternatif";
        $data['form_validation'] = $this->form_validation;
        return view('Admin/Content/Edit_Alternatif', $data);
    }

    public function update($id)
    {
        $data = array(
            'nama_alternatif' => $this->request->getPost('nama_alternatif')
        );

        if ($this->form_validation->run($data, 'input_alternatif') == FALSE) {
            session()->set("fu_i_alternatif", "gagal");
            return redirect()->to("/alternatif/edit/$id")->withInput();
        } else {
            $this->crud->update_data_input('tb_alternatif', $data, 'id', $id);
            session()->set("u_i_alternatif", "sukses");
            return redirect()->to('/alternatif');
        }
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $this->crud->delete_data('tb_alternatif', 'id', $id);
            session()->set("d_alternatif", "sukses");
            return redirect()->to('/alternatif');
        } else {
            session()->set("fd_alternatif", "gagal");
            return redirect()->to('/alternatif');
        }
    }
}
