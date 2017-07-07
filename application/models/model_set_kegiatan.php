<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/set_kegiatan.php";

class Model_set_kegiatan extends Set_kegiatan {

    protected $rules = array(
        array("pegawai_id", "numeric"),
        array("kegiatan_id", "numeric")
    );

    public function __construct() {
        parent::__construct();
    }

    public function get_kegiatan($id_pegawai) {
        $this->get_select_referenced_table();
        return parent::get_where($this->table_name . ".pegawai_id = " . $id_pegawai, '*');
    }

    public function tambah_kegiatan($id_pegawai, $id_kegiatan) {
        $this->pegawai_id = $id_pegawai;
        $this->kegiatan_id = $id_kegiatan;
        return $this->save();
    }

}
