<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include_once "entity/master_pegawai.php";

class Model_master_pegawai extends Master_pegawai {

    protected $rules = array(
        array("pegawai_nip", "required|numeric|min_length[3]|max_length[20]"),
        array("pegawai_nama", "required|min_length[3]|max_length[50]"),
        array("jabatan_id", "required|is_natural_no_zero"),
        array("id_profil", "required|is_natural_no_zero")
    );

    public function __construct() {
        parent::__construct();
    }

    public function all($force_limit = FALSE, $force_offset = FALSE) {
        return parent::get_all(array(
                    "pegawai_nip", "pegawai_nama", "jabatan_nama", "keljab_nama"
                        ), FALSE, TRUE, FALSE, 1, TRUE, $force_limit, $force_offset);
    }

    public function get_by_kelompok_jabatan($id_kelompok) {
        $this->db->join($this->schema_name . '.master_jabatan as mj', 'mj.jabatan_id = ' . $this->table_name . '.jabatan_id', 'left');
        $this->db->where('mj.keljab_id', $id_kelompok);
        $query = $this->db->get($this->table_name);
        return $query->num_rows() > 0 ? $query->result() : FALSE;
    }

    public function get_pegawai_by_id($id_pegawai) {
        $this->get_select_referenced_table();
        $data = $this->get_where('pegawai_id = ' . $id_pegawai, '*');
        return $data;
    }

}
