<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of anggota
 *
 * @author Rinaldi
 */
class Anggota extends Back_end {

    protected $auto_load_model = FALSE;

    public function __construct() {

        parent::__construct();
        $this->load->model(array("model_user", "model_backbone_user", "model_backbone_profil", "model_backbone_user_role", "model_backbone_role"));
    }

    protected function after_login_success() {
        $this->get_user_detail();
//        $data = $this->_call_api('getProfil', $this->user_detail['pegawai_nip']);
        $data = array(
            'kode_organisasi' => 'ko',
            'kode_jabatan' => 'kj'
        );
        $this->lmanuser->set_user_detail('kode_organisasi', $data['kode_organisasi']);
        $this->lmanuser->set_user_detail('kode_jabatan', $data['kode_jabatan']);
    }

}
