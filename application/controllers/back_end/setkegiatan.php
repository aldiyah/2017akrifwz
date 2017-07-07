<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setkegiatan extends Back_end {

    protected $auto_load_model = FALSE;

    public function __construct() {
        parent::__construct('kelola_manajemen_kegiatan', 'Manajemen Kegiatan');
        $this->load->model(array(
            'model_master_pegawai',
            'model_master_kegiatan',
            'model_set_bawahan',
            'model_set_kegiatan'
        ));
    }

    public function index() {
        $this->set("bread_crumb", array(
            "#" => $this->_header_title
        ));
//        $this->set('access_rules', $this->access_rules());
        $this->set('records', $this->model_set_bawahan->get_bawahan($this->pegawai_id));
        $this->set("additional_js", "back_end/" . $this->_name . "/js/index_js");
    }

    public function pilihpegawai() {
        $kelompok = $this->keljab + 1;
        $data['pegawai'] = $this->model_master_pegawai->get_by_kelompok_jabatan($kelompok);
        return $this->load->view('back_end/' . $this->_name . '/pilihpegawai', $data);
    }

    public function tambahpegawai($id_pegawai) {
        $this->model_set_bawahan->set_user_detail($this->user_detail);
        $id = $this->model_set_bawahan->tambah($id_pegawai, $this->pegawai_id);
        $this->to_json($id);
    }

    public function getkegiatan($id_pegawai) {
        $data['records'] = $this->model_set_kegiatan->get_kegiatan($id_pegawai);
        return $this->load->view('back_end/' . $this->_name . '/getkegiatan', $data);
    }

    public function pilihkegiatan($id_pegawai) {
        $data['kegiatan'] = $this->model_master_kegiatan->all()->record_set;
        $data['id_pegawai'] = $id_pegawai;
        return $this->load->view('back_end/' . $this->_name . '/pilihkegiatan', $data);
    }

    public function tambahkegiatan($id_pegawai, $id_kegiatan) {
        $id = $this->model_set_kegiatan->tambah_kegiatan($id_pegawai, $id_kegiatan);
        $this->to_json($id);
    }

}
