<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/tr_aktifitas.php";

class model_tr_aktifitas extends tr_aktifitas {

    public function __construct() {
        parent::__construct();
    }

    public function all($id_pegawai = FALSE, $date = FALSE, $force_limit = FALSE, $force_offset = FALSE) {
        $where = $this->table_name . ".pegawai_id = '" . $id_pegawai . "'";
        if ($date) {
            $where .= " AND " . $this->table_name . ".tr_aktifitas_tanggal = '" . $date . "'";
        }
        return parent::get_all(array("aktifitas_nama", "tr_aktifitas_keterangan"), $where
                        , TRUE, FALSE, 1, TRUE, $force_limit, $force_offset);
    }

//    public function before_count_all() {
//        $this->db->join($this->schema_name . ".master_aktifitas", $this->table_name . ".aktifitas_id = " . $this->schema_name . ".master_aktifitas.aktifitas_id", 'left');
//    }
//    public function get_aktifitas($id_pegawai) {
//        return $this->get_where('pegawai_id = '.$id_pegawai, NULL, 'tr_aktifitas_tanggal');
//    }
    public function get_laporan($id_pegawai = FALSE, $id_aktifitas = 0, $tanggal = FALSE) {
        $this->get_select_referenced_table();
        return $this->get_where($this->table_name . ".pegawai_id = " . $id_pegawai . " and " .
                        $this->table_name . ".aktifitas_id = " . $id_aktifitas . " and " .
                        $this->table_name . ".tr_aktifitas_tanggal = '" . $tanggal . "'", '*');
    }

    public function get_aktifitas_harian($id_pegawai = FALSE, $tanggal = FALSE) {
        $where = $this->table_name . ".pegawai_id = " . $id_pegawai;
        $where .= " and " . $this->table_name . ".tr_aktifitas_tanggal = '" . $tanggal . "'";
        $this->get_select_referenced_table();
        return $this->get_where($where, '*');
    }

    public function get_aktifitas($id_pegawai = FALSE, $bulan = FALSE) {
        $where = $this->table_name . ".pegawai_id = " . $id_pegawai;
        $where .= " and EXTRACT(MONTH FROM " . $this->table_name . ".tr_aktifitas_tanggal) = " . $bulan;
        $this->get_select_referenced_table();
        return $this->get_where($where, '*');
    }

}
