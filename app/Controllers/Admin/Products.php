<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Crud_model;

class Products extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->form_validation = \Config\Services::validation();
        $this->crud = new Crud_model();
    }

    public function index()
    {
        $data['title'] = "Kelola Produk - SPK Traknus";
        $data['content_header'] = "Kelola Produk";
        $data['produk'] = $this->crud->read_data_all("tb_produk");
        return view('Admin/Content/Produk', $data);
    }

    public function add()
    {
        $data['title'] = "Tambah Produk - SPK Traknus";
        $data['content_header'] = "Tambah Data Produk";
        $data['form_validation'] = $this->form_validation;
        return view('Admin/Content/Add_produk', $data);
    }

    public function store()
    {
        $no_produk = $this->request->getPost('no_produk');
        $nama_produk = $this->request->getPost('nama_produk');
        $status = $this->request->getPost('status');

        $data = [
            'nomor_suku_cadang' => $no_produk,
            'nama_suku_cadang' => $nama_produk,
            'status' => $status
        ];
        if ($this->form_validation->run($data, 'input_produk') == FALSE) {
            session()->set("f_i_produk", "gagal");
            return redirect()->to('/produk/add')->withInput();
        } else {
            $this->crud->save_data_input('tb_produk', $data);
            session()->set("s_i_produk", "sukses");
            return redirect()->to('/produk');
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
            return redirect()->to("/produk/edit/$id")->withInput();
        } else {
            $this->crud->update_data_input('tb_produk', $data, 'id', $id);
            session()->set("u_i_produk", "sukses");
            return redirect()->to('/produk');
        }
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $this->crud->delete_data('tb_produk', 'id', $id);
            session()->set("d_produk", "sukses");
            return redirect()->to('/produk');
        } else {
            session()->set("fd_produk", "gagal");
            return redirect()->to('/produk');
        }
    }
}
