<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Set_tugas extends MY_Model {

    public function __construct() {
        parent::__construct("set_tugas");
        $this->primary_key = "tugas_id";
        $this->attribute_labels = array_merge_recursive($this->_continuously_attribute_label, $this->attribute_labels);
        $this->rules = array_merge_recursive($this->_continuously_rules, $this->rules);
    }

    protected $attribute_labels = array(
        "tugas_id" => array("tugas_id", "ID Tugas"),
        "setaktif_id" => array("setaktif_id", "ID Set Aktifitas"),
        "kegiatan_id" => array("kegiatan_id", "ID Kegiatan")
    );
    protected $rules = array(
        array("tugas_id", ""),
        array("setaktif_id", ""),
        array("kegiatan_id", "")
    );
    protected $related_tables = array(
        "set_aktifitas" => array(
            "fkey" => "setaktif_id",
            "columns" => array(
                "pegawai_id",
                "tupoksi_id",
                "aktifitas_id"
            ),
            "referenced" => "LEFT"
        ),
        "master_tupoksi" => array(
            "fkey" => "tupoksi_id",
            "reference_to" => "set_aktifitas",
            "columns" => array(
                "tupoksi_uraian",
                "tupoksi_hukum",
                "tupoksi_uraian"
            ),
            "referenced" => "LEFT"
        ),
        "master_aktifitas" => array(
            "fkey" => "aktifitas_id",
            "reference_to" => "set_aktifitas",
            "columns" => array(
                "aktifitas_kode",
                "aktifitas_nama",
                "aktifitas_output",
                "aktifitas_waktu",
                "aktifitas_kesulitan",
                "aktifitas_bobot"
            ),
            "referenced" => "LEFT"
        ),
        "master_kategori_aktifitas" => array(
            "fkey" => "kategori_id",
            "reference_to" => "master_aktifitas",
            "columns" => array(
                "kategori_nama",
                "kategori_keterangan"
            ),
            "referenced" => "LEFT"
        ),
        "master_kegiatan" => array(
            "fkey" => "kegiatan_id",
            "columns" => array(
                "kegiatan_kode",
                "kegiatan_nama"
            ),
            "referenced" => "LEFT"
        )
    );
    protected $attribute_types = array();

}
