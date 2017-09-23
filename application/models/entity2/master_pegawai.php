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
        "kode_jabatan" => array("kode_jabatan", "Kode Jabatan"),
        "kode_organisasi" => array("kode_organisasi", "Kode Organisasi")
    );
    protected $rules = array(
        array("pegawai_id", ""),
        array("id_profil", ""),
        array("pegawai_nip", ""),
        array("pegawai_nama", ""),
        array("kode_jabatan", ""),
        array("kode_organisasi", "")
    );
    protected $related_tables = array();
    protected $attribute_types = array();

}
