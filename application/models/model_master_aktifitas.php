<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/master_aktifitas.php";

class Model_master_aktifitas extends Master_aktifitas {

    protected $rules = array(
        array("kategori_id", "required|is_natural_no_zero"),
        array("aktifitas_kode", "required|min_length[3]|max_length[20]"),
        array("aktifitas_nama", "required|min_length[3]|max_length[200]"),
        array("aktifitas_output", "required|min_length[3]|max_length[50]"),
        array("aktifitas_waktu", "required|numeric"),
        array("aktifitas_kesulitan", "required|decimal")
    );

    public function __construct() {
        parent::__construct();
    }

    public function all($force_limit = FALSE, $force_offset = FALSE) {
        return parent::get_all(array(
                    "aktifitas_kode", "aktifitas_nama"
                        ), FALSE, TRUE, FALSE, 1, TRUE, $force_limit, $force_offset);
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

    public function before_data_insert($data = FALSE) {
        $data["aktifitas_bobot"] = $data["aktifitas_waktu"] * $data["aktifitas_kesulitan"];
        var_dump($data);
        exit();
        return $data;
    }

    public function before_data_update($data = FALSE) {
        $data["aktifitas_bobot"] = $data["aktifitas_waktu"] * $data["aktifitas_kesulitan"];
        return $data;
    }

}
