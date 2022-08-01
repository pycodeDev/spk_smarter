<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Crud_model;

class Products_keluar extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->form_validation = \Config\Services::validation();
        $this->crud = new Crud_model();
    }

    public function index()
    {
        $data['title'] = "Kelola Produk Keluar - SPK Traknus";
        $data['content_header'] = "Kelola Produk Keluar";
        $data['produk'] = $this->crud->read_data_all("tb_produk");
        return view('Admin/Content/Produk_keluar', $data);
    }

    public function detail($id)
    {
        $data['produk'] = $this->crud->read_data_all_where1('tb_produk', true, 'nomor_suku_cadang', $id);
        $pm = $this->crud->read_data_all_where1('produk_keluar',true, 'nomor_suku_cadang', $id, true, 'tanggal', 'ASC');
        $data['produk_keluar'] = $this->crud->data_product($pm);
        $data['jml_pk'] = $this->crud->num_rows('produk_masuk', true, 'nomor_suku_cadang', $id);
        $name = $data['produk'][0]['nama_suku_cadang'];
        $data['title'] = "Kelola Produk Keluar $name - SPK Traknus";
        $data['content_header'] = "Kelola Produk Keluar";
        return view('Admin/Content/Detail_produk_keluar', $data);
    }

    public function add($id)
    {
        $data['produk'] = $this->crud->read_data_all_where1('tb_produk', true, 'nomor_suku_cadang', $id);
        $name = $data['produk'][0]['nama_suku_cadang'];
        $data['title'] = "Tambah Produk Keluar $name - SPK Traknus";
        $data['content_header'] = "Tambah Data Produk Keluar";
        $data['form_validation'] = $this->form_validation;
        return view('Admin/Content/Add_produk_keluar', $data);
    }

    public function store($id)
    {
        $no_produk = $id;
        $tanggal = $this->request->getPost('tanggal');
        $qty = $this->request->getPost('QTY');
        $jml = $this->crud->read_data_all_where1('tb_produk', true, 'nomor_suku_cadang', $id);
        if (abs((int) $jml[0]['stok']) > $qty) {
            $data = [
                'nomor_suku_cadang' => $no_produk,
                'tanggal' => $tanggal,
                'QTY' => $qty
            ];

            if ($this->form_validation->run($data, 'input_produk_keluar') == FALSE) {
                session()->set("f_i_produk_keluar", "gagal");
                return redirect()->to("/produk_keluar/add/$no_produk")->withInput();
            } else {
                if ($this->crud->rule_input_product($data, 'produk_keluar', 'tanggal') != 0) {
                    session()->set("s_i_produk_keluar", "sukses");
                    return redirect()->to("/produk_keluar/detail/$no_produk");
                } else {
                    session()->set("f_i_produk_keluar2", "gagal");
                    return redirect()->to("/produk_keluar/add/$no_produk")->withInput();
                }
            }
        } else {
            session()->set("f_i_produk_keluar_s", "gagal");
            return redirect()->to("/produk_keluar/detail/$no_produk");
        }
    }

    public function edit($id)
    {
        $data['produk'] = $this->crud->read_all_data("tb_produk_masuk", "id", $id);
        $data['title'] = "Edit Produk Masuk - SPK Traknus";
        $data['content_header'] = "Edit Data Produk Masuk";
        return view('Admin/Content/Edit_produk', $data);
    }

    public function update()
    {
        return "edit";
    }

    public function delete($id, $no_suku_cadang)
    {
        if (!empty($id)) {
            $this->crud->delete_data('produk_keluar', 'id', $id);
            session()->set("d_produk_keluar", "sukses");
            return redirect()->to("/produk_keluar/detail/$no_suku_cadang");
        } else {
            session()->set("fd_produk_keluar", "gagal");
            return redirect()->to("/produk_keluar/detail/$no_suku_cadang");
        }
    }
}
