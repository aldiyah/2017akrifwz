<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setkegiatan extends Back_end {

    protected $auto_load_model = FALSE;

    public function __construct() {
        parent::__construct('kelola_manajemen_kegiatan', 'Manajemen Kegiatan');
        $this->load->model(array(
            'model_master_pegawai',
            'model_master_kegiatan',
            'model_set_kegiatan'
        ));
    }

    public function index() {
        $this->set("bread_crumb", array(
            "#" => $this->_header_title
        ));
//        $data = $this->_call_api('anakBuah', array(
//            'anakBuahIn' => array(
//                'parent' => $this->user_detail['kode_jabatan'],
//                'kdOrganisasi' => $this->user_detail['kode_organisasi']
//            )
//        ));
//        $this->set('records', isset($data['anakBuahOut']->anakBuahList->anakBuahDetail) ? $data['anakBuahOut']->anakBuahList->anakBuahDetail : FALSE);
        
        $bawahan[] = (object) array(
                    'idIdentitas' => "685",
                    'namaLengkap' => "EDI WAHYU",
                    'nip' => "196101181992031004",
                    'kdJabatan' => "300105",
                    'namaJabatan' => "300105",
                    'kdOrganisasi' => "367401000000"
        );
        $bawahan[] = (object) array(
                    'idIdentitas' => "361",
                    'namaLengkap' => "HJ. OOM KOMALASARI",
                    'nip' => "196109111986082001",
                    'kdJabatan' => "300105",
                    'namaJabatan' => "300105",
                    'kdOrganisasi' => "367401000000"
        );
        $this->set('records', $bawahan);
        
        $this->set("additional_js", "back_end/" . $this->_name . "/js/index_js");
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
