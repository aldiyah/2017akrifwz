<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/tr_penilaian.php";

class Model_tr_penilaian extends Tr_penilaian {

    protected $rules = array(
        array("pegawai_id", "required|is_natural_no_zero"),
        array("pertanyaan_id", "is_natural_no_zero"),
        array("penilaian_bulan", "is_natural_no_zero"),
        array("penilaian_tahun", "is_natural_no_zero"),
        array("penilaian_nilai", "is_natural_no_zero"),
        array("penilaian_atasan", "is_natural_no_zero")
    );

    public function __construct() {
        parent::__construct();
    }

    public function all($id_pegawai = FALSE, $bulan = FALSE, $tahun = FALSE, $force_limit = FALSE, $force_offset = FALSE) {
//        return parent::get_all(array(
//            "pertanyaan_id", "penilaian_nilai"
//                        ), $this->table_name . ".pegawai_id = '" . $id_pegawai . "' AND penilaian_bulan = '" . $bulan . "' AND penilaian_tahun = '" . $tahun . "'"
//                        , TRUE, FALSE, 1, TRUE, $force_limit, $force_offset);
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

    public function get_aktifitas($id_pegawai = FALSE, $bulan = FALSE, $tugas = FALSE) {
        $where = $this->table_name . ".pegawai_id = " . $id_pegawai;
        $where .= " and EXTRACT(MONTH FROM " . $this->table_name . ".tr_aktifitas_tanggal) = " . $bulan;
        if ($tugas) {
            $where .= " and " . $this->table_name . ".tugas_id > 0";
        } else {
            $where .= " and " . $this->table_name . ".tugas_id = 0";
        }
        $this->get_select_referenced_table();
        return $this->get_where($where, '*');
    }

}
