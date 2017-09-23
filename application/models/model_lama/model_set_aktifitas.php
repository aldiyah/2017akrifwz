<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/set_aktifitas.php";

class Model_set_aktifitas extends Set_aktifitas {

    protected $rules = array(
        array("pegawai_id", "numeric"),
        array("tupoksi_id", "numeric"),
        array("aktifitas_id", "numeric")
    );

    public function __construct() {
        parent::__construct();
    }

    public function get_aktifitas($id_pegawai = FALSE) {
        $this->get_select_referenced_table();
        return $this->get_where($this->table_name . ".pegawai_id = " . $id_pegawai, '*');
    }

    public function tambah_aktifitas($id_pegawai, $id_kegiatan) {
        $this->pegawai_id = $id_pegawai;
        $this->aktifitas_id = $id_kegiatan;
        return $this->save();
    }

}
