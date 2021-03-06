<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tr_aktifitas extends MY_Model {

    public function __construct() {
        parent::__construct("tr_aktifitas");
        $this->primary_key = "tr_aktifitas_id";
        $this->attribute_labels = array_merge_recursive($this->_continuously_attribute_label, $this->attribute_labels);
        $this->rules = array_merge_recursive($this->_continuously_rules, $this->rules);
    }

    protected $attribute_labels = array(
        "tr_aktifitas_id" => array("tr_aktifitas_id", "ID Input Aktifitas"),
        "pegawai_id" => array("pegawai_id", "Pilih Pegawai"),
        "tugas_id" => array("tugas_id", "Pilih Tugas"),
        "kegiatan_id" => array("kegiatan_id", "Pilih Kegiatan"),
        "aktifitas_id" => array("aktifitas_id", "Pilih Aktifitas"),
        "tr_aktifitas_tanggal" => array("tr_aktifitas_tanggal", "Tanggal Aktifitas"),
        "tr_aktifitas_volume" => array("tr_aktifitas_volume", "Aktifitas Volume"),
        "tr_aktifitas_mulai" => array("tr_aktifitas_mulai", "Aktifitas Mulai"),
        "tr_aktifitas_selesai" => array("tr_aktifitas_selesai", "Aktifitas Selesai"),
        "tr_aktifitas_keterangan" => array("tr_aktifitas_keterangan", "Aktifitas Keterangan"),
        "tr_aktifitas_status" => array("tr_aktifitas_status", "Status Aktifitas")
    );
    protected $rules = array(
        array("tr_aktifitas_id", ""),
        array("pegawai_id", ""),
        array("tugas_id", ""),
        array("kegiatan_id", ""),
        array("aktifitas_id", ""),
        array("tr_aktifitas_tanggal", ""),
        array("tr_aktifitas_volume", ""),
        array("tr_aktifitas_mulai", ""),
        array("tr_aktifitas_selesai", ""),
        array("tr_aktifitas_keterangan", ""),
        array("tr_aktifitas_status", "")
    );
    protected $related_tables = array(
        "master_aktifitas" => array(
            "fkey" => "aktifitas_id",
            "columns" => array(
                "aktifitas_kode",
                "aktifitas_nama"
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
