<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/tp_aktifitas.php";

class Model_tp_aktifitas extends Tp_aktifitas {

    protected $rules = array(
        array("uraian_id", "required|numeric"),
        array("aktifitas_id", "required|numeric")
    );

    public function __construct() {
        parent::__construct();
    }

    public function all($id_uraian = FALSE, $force_limit = FALSE, $force_offset = FALSE) {
        $this->db->where($this->table_name . ".uraian_id = '" . $id_uraian . "'");
        return parent::get_all(array(
                    "tupoksi_nama", "uraian_uraian", "uraian_status"
                        ), FALSE, TRUE, FALSE, 1, TRUE, $force_limit, $force_offset);
    }

//    public function get_like($keyword = FALSE) {
//        $result = FALSE;
//        if ($keyword) {
//            $this->db->order_by("uraian_uraian", "asc");
//            $this->db->where(" lower(" . $this->table_name . ".uraian_uraian) LIKE lower('%" . $keyword . "%')", NULL, FALSE);
//            $result = $this->get_where();
//        }
//        return $result;
//    }

    public function get_aktifitas($id_uraian = FALSE) {
        $this->get_select_referenced_table();
        return $this->get_where($this->table_name . ".uraian_id = " . $id_uraian, '*');
    }

    public function tambah_aktifitas($id_uraian, $id_aktifitas) {
        $this->uraian_id = $id_uraian;
        $this->aktifitas_id = $id_aktifitas;
        return $this->save();
    }

}
