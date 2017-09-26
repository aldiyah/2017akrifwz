<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Validasiaktifitas extends Back_end {

    public $model = 'model_tr_aktifitas';

    public function __construct() {
        parent::__construct('kelola_validasi_aktifitas', 'Validasi Aktifitas');
        $this->load->model(array(
            'model_master_pegawai',
            'model_tr_aktifitas'
        ));
    }

    public function index() {
//        parent::index();
//        $pegawai[] = $this->model_master_pegawai->get_pegawai_by_id($this->pegawai_id);
//        $data = $this->_call_api('anakBuah', array(
//            'anakBuahIn' => array(
//                'parent' => $this->user_detail['kode_jabatan'],
//                'kdOrganisasi' => $this->user_detail['kode_organisasi']
//            )
//        ));
//        $bawahan = isset($data['anakBuahOut']->anakBuahList->anakBuahDetail) ? $data['anakBuahOut']->anakBuahList->anakBuahDetail : FALSE;

        $bawahan[] = (object) array(
                    'idIdentitas' => "1",
                    'namaLengkap' => "EDI WAHYU",
                    'nip' => "196101181992031004",
                    'kdJabatan' => "300105",
                    'namaJabatan' => "300105",
                    'kdOrganisasi' => "367401000000"
        );
        $bawahan[] = (object) array(
                    'idIdentitas' => "2",
                    'namaLengkap' => "HJ. OOM KOMALASARI",
                    'nip' => "196109111986082001",
                    'kdJabatan' => "300105",
                    'namaJabatan' => "300105",
                    'kdOrganisasi' => "367401000000"
        );

        if ($bawahan) {
            foreach ($bawahan as $rows) {
                $pegawai[] = (object) array(
                            'pegawai_id' => $rows->idIdentitas,
                            'pegawai_nama' => $rows->namaLengkap,
                            'pegawai_nip' => $rows->nip,
                            'kode_jabatan' => $rows->kdJabatan,
                            'kode_organisasi' => $rows->kdOrganisasi
                );
            }
        }
        $batas = date('Y-m-d', mktime(0, 0, 0, date('n'), date('j') - 13, date('Y')));
        $records = array();
        foreach ($pegawai as $rows) {
            $info = $this->model_tr_aktifitas->validasi_aktifitas($rows->pegawai_id, $batas);
            if ($info) {
                $records = array_merge($records, $info);
            }
        }
        $this->set('records', $records);
        $this->set('keyword', NULL);
        $this->set('additional_js', 'back_end/' . $this->_name . '/js/index_js');
        $this->set("bread_crumb", array(
            "#" => 'Daftar ' . $this->_header_title
        ));

//        var_dump($this->user_detail);
//        $this->set('pegawai_nip', $this->user_detail['pegawai_nip']);
    }

//    public function get_api($path = FALSE) {
//        switch ($path) {
//            case 'skpdAutoComplete':
//                $params = array('skpdAutoCompleteIn' => array('namaOrganisasi' => 'SEKRETARIAT'));
//                break;
//            case 'nipAutoComplete':
//                $params = array('nipAutoCompleteIn' => array('nip' => '197001222'));
//                break;
//            case 'anakBuah':
//                $params = array('anakBuahIn' => array('parent' => '200108', 'kdOrganisasi' => '367401000000'));
//                break;
//        }
//        $data = $this->_call_api($path, $params);
//        var_dump($data);
//    }
//

    public function validasi($id) {
        if ($this->model_tr_aktifitas->validasi($id, 1)) {
            $this->set_attention_message('Validasi berhasil...');
        } else {
            $this->set_attention_message('Validasi gagal dilakukan...');
        }
        redirect('back_end/validasiaktifitas');
    }

    public function reject($id) {
        if ($this->model_tr_aktifitas->validasi($id, 2)) {
            $this->set_attention_message('Penolakan berhasil...');
        } else {
            $this->set_attention_message('Penolakan gagal dilakukan...');
        }
        redirect('back_end/validasiaktifitas');
    }

}
