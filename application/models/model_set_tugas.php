<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/set_tugas.php";

class Model_set_tugas extends Set_tugas {

    protected $rules = array(
        array("setaktif_id", "numeric"),
        array("kegiatan_id", "numeric")
    );

    public function __construct() {
        parent::__construct();
    }

    public function get_aktifitas($setaktif_id, $id_kegiatan = FALSE) {
        $this->get_select_referenced_table();
        $where = $this->table_name . '.setaktif_id = ' . $setaktif_id;
        if ($id_kegiatan) {
            $where .= ' and ' . $this->table_name . '.kegiatan_id = ' . $id_kegiatan;
        }
        return $this->get_where($where, '*');
    }

    public function get_tugas($id_tugas) {
        $this->get_select_referenced_table();
        $where = $this->table_name . '.tugas_id = ' . $id_tugas;
        return $this->get_where($where, '*');
    }

    public function tambah_kegiatan($id_setaktif, $id_kegiatan) {
        $this->setaktif_id = $id_setaktif;
        $this->kegiatan_id = $id_kegiatan;
        return $this->save();
    }

}
