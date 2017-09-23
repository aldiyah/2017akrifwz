<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/master_tupoksi.php";

class Model_master_tupoksi extends Master_tupoksi {

    protected $rules = array(
        array("tupoksi_nama", "required|min_length[3]|max_length[200]"),
        array("tupoksi_hukum", "required|min_length[3]|max_length[50]"),
        array("tupoksi_tahun", "required|numeric"),
        array("tupoksi_status", "required|numeric")
    );

    public function __construct() {
        parent::__construct();
    }

    public function all($force_limit = FALSE, $force_offset = FALSE) {
        return parent::get_all(array(
                    "tupoksi_nama", "tupoksi_hukum", "tupoksi_tahun"
                        ), FALSE, TRUE, FALSE, 1, TRUE, $force_limit, $force_offset);
    }

    public function get_like($keyword = FALSE) {
        $result = FALSE;
        if ($keyword) {
            $this->db->order_by("tupoksi_nama", "asc");
            $this->db->where(" lower(" . $this->table_name . ".tupoksi_nama) LIKE lower('%" . $keyword . "%')", NULL, FALSE);
            $result = $this->get_where();
        }
        return $result;
    }

    public function get_detail_by_id($id_tupoksi) {
        return $this->get_detail($this->table_name . ".tupoksi_id = '" . $id_tupoksi . "'");
    }

}
