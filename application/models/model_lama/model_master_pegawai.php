<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/master_pegawai.php";

class Model_master_pegawai extends Master_pegawai {

    protected $rules = array(
        array("pegawai_nip", "required|numeric|min_length[3]|max_length[20]"),
        array("pegawai_nama", "required|min_length[3]|max_length[50]"),
        array("kode_jabatan", "required|is_natural_no_zero"),
        array("kode_organisasi", "required|is_natural_no_zero"),
        array("id_profil", "required|is_natural_no_zero")
    );

    public function __construct() {
        parent::__construct();
    }

    public function all($force_limit = FALSE, $force_offset = FALSE) {
        return parent::get_all(array(
                    "pegawai_nip", "pegawai_nama"
                        ), FALSE, TRUE, FALSE, 1, TRUE, $force_limit, $force_offset);
    }

    public function get_pegawai_by_id($id_pegawai) {
        $this->get_select_referenced_table();
        $data = $this->get_detail('pegawai_id = ' . $id_pegawai, '*');
        return $data;
    }

    public function get_like($keyword = FALSE) {
        $result = FALSE;
        if ($keyword) {
            $this->db->order_by("pegawai_nama", "asc");
            $this->db->where(" lower(" . $this->table_name . ".pegawai_nip) LIKE lower('%" . $keyword . "%') OR lower(" . $this->table_name . ".pegawai_nama) LIKE lower('%" . $keyword . "%')", NULL, FALSE);
            $result = $this->get_where();
        }
        return $result;
    }

}
