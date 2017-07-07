<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/set_bawahan.php";

class Model_set_bawahan extends Set_bawahan {

    protected $rules = array(
        array("pegawai_id", "required|is_natural_no_zero")
    );

    public function __construct() {
        parent::__construct();
    }

    public function all($force_limit = FALSE, $force_offset = FALSE) {
        return parent::get_all(array(
                    "pegawai_nip", "pegawai_nama", "jabatan_nama", "keljab_nama"
                        ), FALSE, TRUE, FALSE, 1, TRUE, $force_limit, $force_offset);
    }

    public function get_id_by_username($username) {
        $this->db->where('username', $username);
        return $this->db->get($this->schema_name . ".backbone_user")->row(0)->id_user;
    }

    public function tambah($id_pegawai, $id_atasan) {
        $this->pegawai_id = $id_pegawai;
        $this->atasan_id = $id_atasan;
        return $this->save();
    }

    public function get_bawahan($id_atasan) {
        $this->get_select_referenced_table();
        $data = $this->get_where('atasan_id = ' . $id_atasan, '*');
        return $data;
    }

}
