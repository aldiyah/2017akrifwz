<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/tp_uraian.php";

class Model_tp_uraian extends Tp_uraian {

    protected $rules = array(
        array("tupoksi_id", "required|numeric"),
        array("uraian_uraian", "required|min_length[3]|max_length[200]"),
        array("uraian_status", "required|numeric")
    );

    public function __construct() {
        parent::__construct();
    }

    public function all($id_tupoksi = FALSE, $force_limit = FALSE, $force_offset = FALSE) {
        $this->db->where($this->table_name . ".tupoksi_id = '" . $id_tupoksi . "'");
        return parent::get_all(array(
                    "tupoksi_nama", "uraian_uraian", "uraian_status"
                        ), FALSE, TRUE, FALSE, 1, TRUE, $force_limit, $force_offset);
    }

    public function get_like($keyword = FALSE) {
        $result = FALSE;
        if ($keyword) {
            $this->db->order_by("uraian_uraian", "asc");
            $this->db->where(" lower(" . $this->table_name . ".uraian_uraian) LIKE lower('%" . $keyword . "%')", NULL, FALSE);
            $result = $this->get_where();
        }
        return $result;
    }

    public function get_detail_by_id($id_uraian) {
        return $this->get_detail($this->table_name . ".uraian_id = '" . $id_uraian . "'");
    }

}
