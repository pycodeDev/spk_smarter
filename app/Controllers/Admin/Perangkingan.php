<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Crud_model;
use Spipu\Html2Pdf\Html2Pdf;

class Perangkingan extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->form_validation = \Config\Services::validation();
        $this->crud = new Crud_model();
    }

    public function index()
    {
        $data['title'] = "Kelola Data Perangkingan - SPK Traknus";
        $data['content_header'] = "Kelola Data Perangkingan";
        $data['jml'] = $this->crud->num_rows('tb_perangkingan');
        $data['rank'] = $this->crud->data_rank();
        return view('Admin/Content/Rank', $data);
    }

    public function add($id)
    {
        $data['alternatif'] = $this->crud->read_data_all_where1('tb_alternatif', true, 'id', $id);
        $data['d_alter'] = $this->crud->data_rank_alter($id);
        $data['title'] = "Tambah Data Perangkingan - SPK Traknus";
        $data['content_header'] = "Tambah Data Perangkingan";
        $data['form'] = $this->crud->data_form();
        $data['form_validation'] = $this->form_validation;
        return view('Admin/Content/Add_rank', $data);
    }

    public function store($id)
    {
        $data = $this->request->getPost();

        if ($this->crud->save_data_rank2('tb_perangkingan', $id, $data)) {
            session()->set("s_i_perangkingan", "sukses");
            return redirect()->to('/rank');
        } else {
            session()->set("f_i_perangkingan", "gagal");
            return redirect()->to('/rank/add');
        }
    }

    public function delete($id)
    {
        if ($this->crud->delete_data('tb_perangkingan', 'id_alter', $id)) {
            session()->set("d_perangkingan", "sukses");
            return redirect()->to('/rank');
        } else {
            session()->set("fd_perangkingan", "gagal");
            return redirect()->to('/rank');
        }
    }

    public function smarter()
    {
        $data['hasil'] = $this->crud->persiapan();
        $data['title'] = "Hasil Data Perangkingan - SPK Traknus";
        $data['content_header'] = "Hasil Data Perangkingan";
        $data['data'] = $this->crud->read_data_rank();
        $data['graph'] = $this->crud->read_data_graph();
        if ($data['hasil']['status'] == 1) {
            return view('Admin/Content/Detail_hasil', $data);
        }
    }
    
    public function laporan()
    {
        $data['title'] = "Hasil Data Perangkingan - SPK Traknus";
        $data['content_header'] = "Hasil Data Perangkingan";
        $data['data'] = $this->crud->read_data_rank();
        return view('Admin/Content/Laporan', $data);
    }
    
    public function laporan_html()
    {
        $data = $this->crud->read_data_rank();
        $atrr = "";
        $no = 1;
        foreach ($data as $value) {
            $atrr .= '<tr>
                <td>'. $no .'</td>
                <td>'. $value['nama_alternatif'] .'</td>
                <td>'. $value['hasil'] .'</td>
            </tr>';
            $no++;
        }
        $html2pdf = new Html2Pdf('P', 'A4', 'en', false, 'UTF-8', array(10, 7, 10, 7));
        $html2pdf->writeHTML('
            <div style="text-align:center">
                <img src="./assets/img/logo-color.png" alt="" style="width:200px;height:30px;">
            </div>
            <hr/>
            <div style="text-align:center">
                <h3 style="font-weight:bold">Laporan Data Perangkingan Penerimaan Reward PT Traktor Nusantara</h3>
            </div>
            <div>
                <div style="margin:auto;width:50%">
                    <table border="1" style="width:100%;margin-top:10px">
                        <thead>
                            <tr>
                                <th style="text-align:center">Rangking</th>
                                <th style="text-align:center">Nama Alternatif</th>
                                <th style="text-align:center">Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                        '. $atrr .'
                        </tbody>
                    </table>
                </div>
            </div>
        ');
        $html2pdf->output('Laporan.pdf');
        exit;
    }
}
