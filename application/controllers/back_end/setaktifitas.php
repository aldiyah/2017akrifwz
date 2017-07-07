<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setaktifitas extends Back_end {

    protected $auto_load_model = FALSE;

    public function __construct() {
        parent::__construct('kelola_setting_aktifitas', 'Setting Aktifitas');
        $this->load->model(array(
            'model_set_kegiatan',
            'model_set_bawahan',
            'model_set_aktifitas',
            'model_set_tugas',
            'model_master_aktifitas'
        ));
    }

    public function index() {
        $this->set("bread_crumb", array(
            "#" => $this->_header_title
        ));
        $this->set('access_rules', $this->access_rules());
        $this->set('records', $this->model_set_bawahan->get_bawahan($this->pegawai_id));
        $this->set("additional_js", "back_end/" . $this->_name . "/js/index_js");
    }

    public function getaktifitas($id_pegawai) {
        $aktifitas = $this->model_set_aktifitas->get_aktifitas($id_pegawai);
        $result = FALSE;
        if ($aktifitas) {
            foreach ($aktifitas as $row) {
                $result[] = array(
                    'aktifitas' => $row,
                    'kegiatan' => $this->model_set_tugas->get_aktifitas($row->setaktif_id)
                );
            }
        }
        $data['records'] = $result;
        $this->load->view('back_end/' . $this->_name . '/getaktifitas', $data);
    }

    public function pilihaktifitas($id_pegawai) {
        $data['aktifitas'] = $this->model_master_aktifitas->all()->record_set;
        $data['id_pegawai'] = $id_pegawai;
        return $this->load->view('back_end/' . $this->_name . '/pilihaktifitas', $data);
    }

    public function tambahaktifitas($id_pegawai, $id_aktifitas) {
        $id = $this->model_set_aktifitas->tambah_aktifitas($id_pegawai, $id_aktifitas);
        $this->to_json($id);
    }

    public function pilihkegiatan($id_pegawai, $id_setaktif) {
        $data['kegiatan'] = $this->model_set_kegiatan->get_kegiatan($id_pegawai);
        $data['id_pegawai'] = $id_pegawai;
        $data['id_setaktif'] = $id_setaktif;
        return $this->load->view('back_end/' . $this->_name . '/pilihkegiatan', $data);
    }

    public function tambahkegiatan($id_setaktif, $id_kegiatan) {
        $id = $this->model_set_tugas->tambah_kegiatan($id_setaktif, $id_kegiatan);
        $this->to_json($id);
    }

}
