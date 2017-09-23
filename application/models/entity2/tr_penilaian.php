<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tr_penilaian extends MY_Model {

    public function __construct() {
        parent::__construct("tr_penilaian");
        $this->primary_key = "penilaian_id";
        $this->attribute_labels = array_merge_recursive($this->_continuously_attribute_label, $this->attribute_labels);
        $this->rules = array_merge_recursive($this->_continuously_rules, $this->rules);
    }

    protected $attribute_labels = array(
        "penilaian_id" => array("penilaian_id", "ID Penilaian"),
        "pegawai_id" => array("pegawai_id", "ID Pegawai"),
        "pertanyaan_id" => array("pertanyaan_id", "ID Pertanyaan"),
        "penilaian_bulan" => array("penilaian_bulan", "Penilaian Bulan"),
        "penilaian_tahun" => array("penilaian_tahun", "Penilaian Tahun"),
        "pertanyaan_id" => array("pertanyaan_id", "ID Pertanyaan"),
        "penilaian_nilai" => array("penilaian_nilai", "Nilai"),
        "penilaian_atasan" => array("penilaian_atasan", "Atasan")
    );
    protected $rules = array(
        array("penilaian_id", ""),
        array("pegawai_id", ""),
        array("pertanyaan_id", ""),
        array("penilaian_bulan", ""),
        array("penilaian_tahun", ""),
        array("penilaian_nilai", ""),
        array("penilaian_atasan", "")
    );
    protected $related_tables = array(
//        "master_aktifitas" => array(
//            "fkey" => "aktifitas_id",
//            "columns" => array(
//                "aktifitas_kode",
//                "aktifitas_nama"
//            ),
//            "referenced" => "LEFT"
//        )
    );
    protected $attribute_types = array();

}
