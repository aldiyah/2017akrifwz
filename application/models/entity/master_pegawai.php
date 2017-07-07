<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_pegawai extends MY_Model {

    public $sort_by = 'pegawai_nama';
    public $sort_mode = 'asc';

    public function __construct() {
        parent::__construct("master_pegawai");
        $this->primary_key = "pegawai_id";
        $this->attribute_labels = array_merge_recursive($this->_continuously_attribute_label, $this->attribute_labels);
        $this->rules = array_merge_recursive($this->_continuously_rules, $this->rules);
    }

    protected $attribute_labels = array(
        "pegawai_id" => array("pegawai_id", "ID Pegawai"),
        "id_profil" => array("id_profil", "ID Profil"),
        "pegawai_nip" => array("pegawai_nip", "NIP Pegawai"),
        "pegawai_nama" => array("pegawai_nama", "Nama Pegawai"),
        "jabatan_id" => array("jabatan_id", "ID Jabatan")
    );
    protected $rules = array(
        array("pegawai_id", ""),
        array("id_profil", ""),
        array("pegawai_kode", ""),
        array("pegawai_nama", ""),
        array("jabatan_id", "")
    );
    protected $related_tables = array(
        "master_jabatan" => array(
            "fkey" => "jabatan_id",
            "columns" => array(
                "jabatan_nama",
                "jabatan_keterangan"
            ),
            "referenced" => "LEFT"
        ),
        "master_kelompok_jabatan" => array(
            "fkey" => "keljab_id",
            "reference_to" => "master_jabatan",
            "columns" => array(
                "keljab_nama",
                "keljab_keterangan"
            ),
            "referenced" => "LEFT"
        )
    );
    protected $attribute_types = array();

}
