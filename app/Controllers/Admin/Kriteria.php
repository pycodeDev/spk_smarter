<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Crud_model;

class Kriteria extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->form_validation = \Config\Services::validation();
        $this->crud = new Crud_model();
    }

    public function index()
    {
        $data['title'] = "Kelola Kriteria - SPK Traknus";
        $data['content_header'] = "Kelola Kriteria";
        $data['kriteria'] = $this->crud->read_data_all("tb_kriteria");
        return view('Admin/Content/Kriteria', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Data Kriteria - SPK Traknus";
        $data['content_header'] = "Tambah Data Kriteria";
        $data['form_validation'] = $this->form_validation;
        return view('Admin/Content/Add_kriteria', $data);
    }

    public function store()
    {
        $data = $this->request->getPost();

        if ($this->crud->save_data_rank($data, 'tb_kriteria')) {
            session()->set("s_i_kriteria", "sukses");
            return redirect()->to('/kriteria');
        } else {
            session()->set("f_i_kriteria", "gagal");
            return redirect()->to('/kriteria/add');
        }
    }

    public function edit($id)
    {
        $data['produk'] = $this->crud->read_data_all_where1("tb_produk", true, "id", $id);
        $data['title'] = "Edit Produk - SPK Traknus";
        $data['content_header'] = "Edit Data Produk";
        $data['form_validation'] = $this->form_validation;
        return view('Admin/Content/Edit_produk', $data);
    }

    public function update($id)
    {
        $data = array(
            'nomor_suku_cadang' => $this->request->getPost('no_produk'),
            'nama_suku_cadang' => $this->request->getPost('nama_produk'),
            'status' => $this->request->getPost('status')
        );

        if ($this->form_validation->run($data, 'input_produk') == FALSE) {
            session()->set("fu_i_produk", "gagal");
            return redirect()->to('/produk/add')->withInput();
        } else {
            $this->crud->update_data_input('tb_produk', $data, 'id', $id);
            session()->set("u_i_produk", "sukses");
            return redirect()->to('/produk');
        }
    }

    public function delete()
    {
        if ($this->crud->delete_truncate('tb_kriteria')) {
            session()->set("d_kriteria", "sukses");
            return redirect()->to('/kriteria');
        } else {
            session()->set("fd_kriteria", "gagal");
            return redirect()->to('/kriteria');
        }
    }
}
