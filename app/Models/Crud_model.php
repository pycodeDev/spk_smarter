<?php

namespace App\Models;

use CodeIgniter\Model;

class Crud_model extends Model
{
    public $month = array(
        "Januari" => "01",
        "Februari" => "02",
        "Maret" => "03",
        "April" => "04",
        "Mei" => "05",
        "Juni" => "06",
        "Juli" => "07",
        "Agustus" => "08",
        "September" => "09",
        "Oktober" => "10",
        "November" => "11",
        "Desember" => "12"
    );

    public function read_data_all($table)
    {
        return $this->db->table($table)->get()->getResultArray();
    }

    public function read_data_all_where1($table, $where = false, $param = 'id', $id = 1, $order = false, $o_param = 'id', $sort = 'ASC')
    {
        if ($where != false) {
            if ($order != false) {
                return $this->db->table($table)->where($param, $id)->orderBy($o_param, $sort)->get()->getResultArray();
            } else {
                return $this->db->table($table)->where($param, $id)->get()->getResultArray();
            }
        } else {
            if ($order != false) {
                return $this->db->table($table)->orderBy($o_param, $sort)->get()->getResultArray();
            }
        }
    }

    public function save_data_input($table, $data, $where = false, $param = 'id', $id = 1)
    {
        if ($where != false) {
            return $this->db->table($table)->where($param, $id)->insert($data);
        } else {
            return $this->db->table($table)->insert($data);
        }
    }

    public function update_data_input($table, $data, $param, $id)
    {
        return $this->db->table($table)->update($data, [$param => $id]);
    }

    public function update_data_input2($table, $data, $array_where)
    {
        return $this->db->table($table)->update($data, $array_where);
    }

    public function delete_data($table, $param, $id)
    {
        return $this->db->table($table)->delete([$param => $id]);
    }

    public function delete_truncate($table)
    {
        return $this->db->table($table)->truncate();
    }

    public function num_rows($table, $where = false, $w_param = 'id', $id = 1, $select = '*', $like = false)
    {
        if ($where == false and $like == false) {
            return $this->db->table($table)->select($select)->countAllResults();
        } elseif ($where != false and $like == false) {
            return $this->db->table($table)->select($select)->where($w_param, $id)->countAllResults();
        } elseif ($where == false and $like != false) {
            return $this->db->table($table)->select($select)->like($w_param, $id)->countAllResults();
        }
    }

    public function join_data($table, $select = '*', $join_tb, $join_on, $join_type, $where = false, $param = 'id', $id = 1)
    {
        if ($where = true) {
            return $this->db->table($table)->select($select)->join($join_tb, $join_on, $join_type)->where([$param => $id])->get()->getResultArray();
        } else {
            return $this->db->table($table)->select($select)->join($join_tb, $join_on, $join_type)->get()->getResultArray();
        }
    }

    public function rule_input_product($data, $tbl, $param)
    {
        $date = explode('-', $data['tanggal']);
        $date = "$date[0]-$date[1]";
        $jml = $this->num_rows($tbl, true, $param, $date, '*', true);
        if ($jml > 0) {
            $msg = 0;
            return $msg;
        } else {
            $arr = array(
                "nomor_suku_cadang" => $data['nomor_suku_cadang'],
                "QTY" => $data['QTY'],
                "tanggal" => $data['tanggal']
            );
            $this->save_data_input($tbl, $arr);
            $msg = 1;
            return $msg;
        }
    }
    
    public function solo_query($query)
	{
		return $this->db->query($query)->getResultArray();
	}

    public function data_product($data)
    {
        $hasil = array();
        foreach ($data as $val) {
            $d = explode('-', $val['tanggal']);
            $year = $d[0];
            $month = array_search($d[1], $this->month);
            $aa['id'] = $val['id'];
            $aa['nomor_suku_cadang'] = $val['nomor_suku_cadang'];
            $aa['tahun'] = $year;
            $aa['bulan'] = $month;
            $aa['qty'] = $val['QTY'];
            $hasil[] = $aa;
        }
        return $hasil;
    }

    public function save_data_rank($data, $table, $where = false, $param = 'id', $id = 1)
    {
        $item = $data['dynamic_form']['dynamic_form'];
        if ($where != false) {
            for ($i = 0; $i < count($item); $i++) {
                $rank = $i + 1;
                $input = array(
                    'id_krit' => $id,
                    'nama_sub_kriteria' => $item[$i]['sub_kriteria'],
                    'rank' => $rank,
                    'bobot' => $this->roc($rank, count($item))
                );
                $this->save_data_input($table, $input, $where, $param, $id);
            }
            return true;
        } else {
            for ($i = 0; $i < count($item); $i++) {
                $rank = $i + 1;
                $input = array(
                    'nama_kriteria' => $item[$i]['kriteria'],
                    'rank' => $rank,
                    'bobot' => $this->roc($rank, count($item))
                );
                $this->save_data_input($table, $input);
            }
            return true;
        }
    }

    public function data_form()
    {
        $data = array();
        $kriteria = $this->read_data_all_where1('tb_kriteria', false, 'id', 1, true, 'rank');
        for ($i = 0; $i < count($kriteria); $i++) {
            $aa = array();
            $sub_krit = $this->read_data_all_where1('tb_sub_kriteria', true, 'id_krit', $kriteria[$i]['id'], true, 'rank', 'ASC');
            for ($ii = 0; $ii < count($sub_krit); $ii++) {
                array_push($aa, array(
                    $sub_krit[$ii]['nama_sub_kriteria'] => $sub_krit[$ii]['id']
                ));
            }

            array_push($data, array(
                $kriteria[$i]['nama_kriteria'] => [$aa]
            ));
        }

        return $data;
    }

    public function roc($rank, $jml)
    {
        $hasil = 0;
        for ($i = $rank; $i <= $jml; $i++) {
            if ($i == 1) {
                $hasil = $hasil + 1;
            } else {
                $hasil = $hasil + (1 / $i);
            }
        }
        $a = $hasil / $jml;
        return $a;
    }

    public function smarter($data)
    {
        $hasil = 0;
        $akhir = array();
        for ($i = 0; $i < count($data); $i++) {
            $k_bobot = $this->read_data_all_where1('tb_kriteria', true, 'id', $data[$i]['id_kriteria']);
            $s_bobot = $this->read_data_all_where1('tb_sub_kriteria', true, 'id', $data[$i]['id_sub_krit']);

            $x = $k_bobot[0]['bobot'] * $s_bobot[0]['bobot'];

            $hasil = $hasil + $x;
        }
        array_push($akhir, array(
            'id_alternatif' => $data[0]['id_alter'],
            'hasil' => $hasil
        ));

        return $akhir;
    }

    public function data_rank()
    {
        $data = array();
        $alter = $this->read_data_all('tb_alternatif');
        for ($i = 0; $i < count($alter); $i++) {
            $id = $alter[$i]['id'];
            $jml = $this->num_rows('tb_perangkingan', true, 'id_alter', $id, 'id_alter');
            if ($jml > 0) {
                array_push($data, array(
                    "id_alternatif" => $alter[$i]['id'],
                    "nama_alternatif" => $alter[$i]['nama_alternatif'],
                    "status" => "sudah"
                ));
            } else {
                array_push($data, array(
                    "id_alternatif" => $alter[$i]['id'],
                    "nama_alternatif" => $alter[$i]['nama_alternatif'],
                    "status" => "belum"
                ));
            }
        }
        return $data;
    }

    public function data_rank_alter($id_alter)
    {
        $data = array();
        $kriteria = $this->read_data_all_where1('tb_kriteria', false, 'id', 1, true, 'id', 'ASC');
        for ($i = 0; $i < count($kriteria); $i++) {
            $jml = $this->db->table('tb_perangkingan')->select('id')->where(['id_alter' => $id_alter, 'id_kriteria' => $kriteria[$i]['id']])->countAllResults();;
            if ($jml > 0) {
                $id_sub = $this->db->table('tb_perangkingan')->select('id_sub_krit')->where(['id_alter' => $id_alter, 'id_kriteria' => $kriteria[$i]['id']])->get()->getResultArray();
                $bobot = $this->read_data_all_where1('tb_sub_kriteria', true, 'id', $id_sub[0]['id_sub_krit']);
                array_push($data, array(
                    'nama_kriteria' => $kriteria[$i]['nama_kriteria'],
                    'bobot' => $bobot[0]['nama_sub_kriteria']
                ));
            } else {
                array_push($data, array(
                    'nama_kriteria' => $kriteria[$i]['nama_kriteria'],
                    'bobot' => '-'
                ));
            }
        }
        return $data;
    }

    public function save_data_rank2($table, $id_alter, $data)
    {
        $jml = $this->num_rows($table, true, 'id_alter', $id_alter);
        if ($jml > 0) {
            for ($i = 0; $i < count($data); $i++) {
                $id = $i + 1;
                $name = 'kriteria_' . $id;
                $input = array(
                    "id_sub_krit" => $data[$name]
                );
                $this->update_data_input2($table, $input, ['id_alter' => $id_alter, 'id_kriteria' => $id]);
            }

            return true;
        } else {
            for ($i = 0; $i < count($data); $i++) {
                $id = $i + 1;
                $name = 'kriteria_' . $id;
                $input = array(
                    "id_alter" => $id_alter,
                    "id_kriteria" => $id,
                    "id_sub_krit" => $data[$name]
                );

                $this->save_data_input($table, $input);
            }

            return true;
        }
    }

    public function persiapan()
    {
        $sukses = 0;
        $data = $this->db->table("tb_perangkingan")->groupBy("id_alter")->orderBy('id_alter', 'ASC')->get()->getResultArray();
        for ($i = 0; $i < count($data); $i++) {
            $id_alter = $data[$i]['id_alter'];
            $jml = $this->num_rows('tb_hasil', true, $w_param = 'id_alternatif', $id_alter);
            if ($jml > 0) {
                # update
                $dataa = $this->read_data_all_where1('tb_perangkingan', true, 'id_alter', $id_alter);
                $hasil = $this->smarter($dataa);
                if ($this->update_data_input('tb_hasil', array('hasil' => $hasil[0]['hasil']), 'id_alternatif', $hasil[0]['id_alternatif'])) {
                    $sukses = $sukses + 1;
                }
            } else {
                # insert
                $dataa = $this->read_data_all_where1('tb_perangkingan', true, 'id_alter', $id_alter);
                $hasil = $this->smarter($dataa);
                if ($this->save_data_input('tb_hasil', array('id_alternatif' => $hasil[0]['id_alternatif'], 'hasil' => $hasil[0]['hasil']))) {
                    $sukses = $sukses + 1;
                }
            }
        }
        return array('status' => 1, 'msg' => $sukses);
    }

    public function read_data_rank()
    {
        $hasil = array();
        $data = $this->read_data_all_where1('tb_hasil', false, 'id', 1, $order = true,  'hasil', 'ASC');
        foreach ($data as $a) {
            $nama_alternatif = $this->read_data_all_where1('tb_alternatif', true, 'id', $a['id_alternatif']);
            array_push($hasil, array(
                'nama_alternatif' => $nama_alternatif[0]['nama_alternatif'],
                'hasil' => $a['hasil']
            ));
        }
        return $hasil;
    }

    public function read_data_graph()
    {
        $hasil = array();
        $data = $this->read_data_all_where1('tb_hasil', false, 'id', 1, $order = true,  'hasil', 'ASC');
        foreach ($data as $a) {
            $nama_alternatif = $this->read_data_all_where1('tb_alternatif', true, 'id', $a['id_alternatif']);
            array_push($hasil, array(
                'name' => $nama_alternatif[0]['nama_alternatif'],
                'y' => $a['hasil']
            ));
        }
        return json_encode($hasil);
    }
}
