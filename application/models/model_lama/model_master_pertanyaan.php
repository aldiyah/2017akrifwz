<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/master_pertanyaan.php";

class Model_master_pertanyaan extends Master_pertanyaan {

    protected $rules = array(
        array("kategori_id", "required|is_natural_no_zero"),
        array("pertanyaan_isi", "required|min_length[3]|max_length[200]"),
        array("pertanyaan_jenis", "required|numeric")
    );

    public function __construct() {
        parent::__construct();
    }

    public function all($force_limit = FALSE, $force_offset = FALSE) {
        return parent::get_all(array(
                    "pertanyaan_isi"
                        ), FALSE, TRUE, FALSE, 1, TRUE, $force_limit, $force_offset);
    }

    public function get_like($keyword = FALSE) {
        $result = FALSE;
        if ($keyword) {
            $this->db->order_by("pertanyaan_isi", "asc");
            $this->db->where(" lower(" . $this->table_name . ".pertanyaan_isi) LIKE lower('%" . $keyword . "%')", NULL, FALSE);
            $result = $this->get_where();
        }
        return $result;
    }

}
