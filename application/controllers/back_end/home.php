<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Back_end {

    protected $auto_load_model = FALSE;

    public function can_access() {
        return TRUE;
    }

    public function __construct() {
        parent::__construct();
        $this->load->model(array(
            'model_set_bawahan',
            'model_master_pegawai',
            'model_tr_aktifitas'
        ));
    }

    public function index() {
        parent::index();
        $id_pegawai = 0;
        if ($this->user_detail['pegawai_id'] != NULL) {
            $id_pegawai = $this->user_detail['pegawai_id'];
        }
        $pegawai = $this->model_master_pegawai->get_pegawai_by_id($id_pegawai);
        $bawahan = $this->model_set_bawahan->get_bawahan($id_pegawai);
        if ($bawahan) {
            foreach ($bawahan as $rows) {
                $pegawai[] = $rows;
            }
        }
        $this->set('records', $pegawai);
    }

    public function lihataktifitas($id_pegawai) {
        $bulan = date('n');
        $data['utama'] = $this->model_tr_aktifitas->get_aktifitas($id_pegawai, $bulan, TRUE);
        $data['umum'] = $this->model_tr_aktifitas->get_aktifitas($id_pegawai, $bulan, FALSE);
        return $this->load->view('back_end/home/lihataktifitas', $data);
    }

}
