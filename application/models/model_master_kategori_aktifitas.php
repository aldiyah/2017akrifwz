<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/master_kategori_aktifitas.php";

class Model_master_kategori_aktifitas extends Master_kategori_aktifitas {

    protected $rules = array(
        array("kategori_nama", "required|min_length[3]|max_length[20]"),
        array("kategori_keterangan", "required|min_length[3]|max_length[200]")
    );

    public function __construct() {
        parent::__construct();
    }

    public function all($force_limit = FALSE, $force_offset = FALSE) {
        return parent::get_all(array(
                    "kategori_nama", "kategori_keterangan"
                        ), FALSE, TRUE, FALSE, 1, TRUE, $force_limit, $force_offset);
    }

    public function get_like($keyword = FALSE) {
        $result = FALSE;
        if ($keyword) {
            $this->db->order_by("kategori_nama", "asc");
            $this->db->where(" lower(" . $this->table_name . ".kategori_nama) LIKE lower('%" . $keyword . "%') OR lower(" . $this->table_name . ".kategori_keterangan) LIKE lower('%" . $keyword . "%')", NULL, FALSE);
            $result = $this->get_where();
        }
        return $result;
    }

}
