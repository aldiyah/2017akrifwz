<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/master_kegiatan.php";

class Model_master_kegiatan extends Master_kegiatan {

    protected $rules = array(
        array("kegiatan_kode", "required|min_length[3]|max_length[20]"),
        array("kegiatan_nama", "required|min_length[3]|max_length[200]")
    );

    public function __construct() {
        parent::__construct();
    }

    public function all($force_limit = FALSE, $force_offset = FALSE) {
        return parent::get_all(array(
                    "kegiatan_kode", "kegiatan_nama"
                        ), FALSE, TRUE, FALSE, 1, TRUE, $force_limit, $force_offset);
    }

    public function get_like($keyword = FALSE) {
        $result = FALSE;
        if ($keyword) {
            $this->db->order_by("kegiatan_nama", "asc");
            $this->db->where(" lower(" . $this->table_name . ".kegiatan_kode) LIKE lower('%" . $keyword . "%') OR lower(" . $this->table_name . ".kegiatan_nama) LIKE lower('%" . $keyword . "%')", NULL, FALSE);
            $result = $this->get_where();
        }
        return $result;
    }

}
