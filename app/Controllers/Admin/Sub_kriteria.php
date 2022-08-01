<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Crud_model;

class Sub_kriteria extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->form_validation = \Config\Services::validation();
        $this->crud = new Crud_model();
    }

    public function index()
    {
        $data['title'] = "Kelola Sub Kriteria - SPK Traknus";
        $data['content_header'] = "Kelola Sub Kriteria";
        $data['kriteria'] = $this->crud->read_data_all("tb_kriteria");
        return view('Admin/Content/sub_kriteria', $data);
    }

    public function search()
    {
        $a = array();
        $id = $this->request->getPost('id');
        $sub_kriteria = $this->crud->join_data('tb_sub_kriteria tsk', 'tk.nama_kriteria, tsk.nama_sub_kriteria, tsk.rank', 'tb_kriteria tk', 'tk.id=tsk.id_krit', 'left', true, 'tsk.id_krit', $id);
        array_push($a, array('data' => $sub_kriteria, 'token' => csrf_hash()));
        echo json_encode($a);
    }

    public function add($id)
    {
        $data['title'] = "Tambah Data Sub Kriteria - SPK Traknus";
        $data['content_header'] = "Tambah Data Sub Kriteria";
        $data['form_validation'] = $this->form_validation;
        $data['kriteria'] = $this->crud->read_data_all_where1('tb_kriteria', true, 'id', $id);
        return view('Admin/Content/Add_sub_kriteria', $data);
    }

    public function store($id)
    {
        $data = $this->request->getPost();

        if ($this->crud->save_data_rank($data, 'tb_sub_kriteria', true, 'id_krit', $id)) {
            session()->set("s_i_s_kriteria", "sukses");
            return redirect()->to('/sub_kriteria');
        } else {
            session()->set("f_i_s_kriteria", "gagal");
            return redirect()->to("/sub_kriteria/add/$id");
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

    public function delete($id)
    {
        if (!empty($id)) {
            $this->crud->delete_data('tb_sub_kriteria', 'id_krit', $id);
            session()->set("d_sub_kriteria", "sukses");
            return redirect()->to('/sub_kriteria');
        } else {
            session()->set("fd_sub_kriteria", "gagal");
            return redirect()->to('/sub_kriteria');
        }
    }
}
