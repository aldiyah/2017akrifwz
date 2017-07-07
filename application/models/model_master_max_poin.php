<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/master_max_poin.php";

class Model_master_max_poin extends Master_max_poin {

    protected $rules = array(
        array("max_poin_jabatan", "required|min_length[3]|max_length[50]"),
        array("max_poin_peringkat", "required|min_length[3]|max_length[10]"),
        array("max_poin_nilai", "required|numeric"),
        array("max_poin_tkd", "required|numeric")
    );

    public function __construct() {
        parent::__construct();
    }

    public function all($force_limit = FALSE, $force_offset = FALSE, $order_by = NULL) {
        return parent::get_all(array(
                    "max_poin_jabatan", "max_poin_peringkat"
                        ), FALSE, TRUE, FALSE, 1, TRUE, $force_limit, $force_offset, $order_by);
    }

    public function get_like($keyword = FALSE) {
        $result = FALSE;
        if ($keyword) {
            $this->db->order_by("aktifitas_nama", "asc");
            $this->db->where(" lower(" . $this->table_name . ".aktifitas_kode) LIKE lower('%" . $keyword . "%') OR lower(" . $this->table_name . ".aktifitas_nama) LIKE lower('%" . $keyword . "%')", NULL, FALSE);
            $result = $this->get_where();
        }
        return $result;
    }

}
