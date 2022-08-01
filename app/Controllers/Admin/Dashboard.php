<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Login_model;
use App\Models\Crud_model;


class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->crud = new Crud_model();
    }

    public function index()
    {
        $data['title'] = "Dashboard - SPK Traknus";
        $data['content_header'] = "Halaman Dashboard";
        $data['kriteria'] = $this->crud->read_data_all("tb_kriteria");
        $data['alternatif'] = $this->crud->read_data_all("tb_alternatif");
        return view('Admin/Content/Dashboard', $data);
    }
    
    public function chart()
    {
        $rank = $this->crud->solo_query("Select ta.nama_alternatif, th.hasil from tb_hasil th left join tb_alternatif ta on th.id_alternatif=ta.id order by th.hasil desc");
        echo json_encode($rank);
    }

    public function profil()
    {
        $data['title'] = "Profil - SPK Traknus";
        $data['content_header'] = "Halaman Profil PT. Traktor Nusantara";
        return view('Admin/Content/Profil', $data);
    }

    public function stok()
    {
        $data['title'] = "Stok Produk - SPK Traknus";
        $data['content_header'] = "Stok Produk PT Traktor Nusantara";
        $data['produk'] = $this->crud->read_data_all("tb_produk");
        return view('Admin/Content/Stok_produk', $data);
    }
}
