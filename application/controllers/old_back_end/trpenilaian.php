<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Trpenilaian extends Back_end {

    public $model = 'model_tr_penilaian';

    public function __construct() {
        parent::__construct('kelola_penilaian_kinerja', 'Penilaian Kinerja');
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

//        var_dump($pegawai);
//        exit();

        $this->set('records', $pegawai);
        $this->set('pegawai_nip', $this->user_detail['pegawai_nip']);

//        $detail_tupoksi = $this->model_master_tupoksi->get_detail_by_id($id_tupoksi);
//        $this->get_attention_message_from_session();
//        $this->model_master_uraian->change_offset_param("currpage_" . $this->cmodul_name);
//        $records = $this->model_master_uraian->all($id_tupoksi);
//
//        $paging_set = $this->get_paging($this->get_current_location(), $records->record_found, $this->default_limit_paging, $this->cmodul_name);
//        $this->set('records', $records->record_set);
//        $this->set('keyword', $records->keyword);
//        $this->set('field_id', $this->model_master_uraian->primary_key);
//        $this->set('paging_set', $paging_set);
//        $this->set('detail_tupoksi', $detail_tupoksi);
//        $this->set('additional_js', 'back_end/' . $this->_name . '/js/index_js');
//        $this->set('next_list_number', $this->model_master_uraian->get_next_record_number_list());
//
        $this->set('bread_crumb', array(
//            "back_end/mstupoksi" => "Master Tupoksi",
            "#" => $this->_header_title
        ));
    }

    public function detail($id_tupoksi = FALSE, $id_uraian = FALSE) {
//        parent::detail($id_uraian, array(
//            "tupoksi_id", "uraian_uraian", "uraian_status"
//                ), $id_tupoksi);
//        $detail_tupoksi = $this->model_master_tupoksi->get_detail_by_id($id_tupoksi);
//        $this->set('detail_tupoksi', $detail_tupoksi);
//        $this->set('id_tupoksi', $id_tupoksi);
//        $this->set('bread_crumb', array(
//            "back_end/mstupoksi" => "Master Tupoksi",
//            "back_end/" . $this->_name . "/index/" . $id_tupoksi => $this->_header_title,
//            "#" => 'Formulir ' . $this->_header_title
//        ));
    }

    public function get_like() {
//        $keyword = $this->input->post("keyword");
//        $kategori_found = $this->model_master_tupoksi->get_like($keyword);
//        $this->to_json($kategori_found);
    }

    public function uraian($id = FALSE) {
//        $this->load->model('model_master_uraian');
//        parent::detail($id, array(
//            "tupoksi_nama", "tupoksi_hukum", "tupoksi_tahun", "tupoksi_status"
//        ));
//        $this->set("bread_crumb", array(
//            "back_end/" . $this->_name => $this->_header_title,
//            "#" => 'Uraian ' . $this->_header_title
//        ));
//        $this->set('uraian', $this->model_master_uraian->get_uraian($id));
    }

    public function aktifitas($id_pegawai) {
        $pegawai = $this->model_master_pegawai->get_pegawai_by_id($id_pegawai);
        $records = $this->model_tr_aktifitas->all($id_pegawai);
        $paging_set = $this->get_paging($this->get_current_location(), $records->record_found, $this->default_limit_paging, $this->cmodul_name);
        $this->set('pegawai', $pegawai);
        $this->set('records', $records->record_set);
        $this->set('paging_set', $paging_set);
        $this->set('bread_crumb', array(
            "back_end/trpenilaian" => "Penilaian Kinerja",
            "#" => $this->_header_title . " Aktifitas Pegawai"
        ));
    }

    public function perilaku($id_pegawai) {
        $pegawai = $this->model_master_pegawai->get_pegawai_by_id($id_pegawai);
        $records = $this->model_tr_aktifitas->all($id_pegawai);
        $paging_set = $this->get_paging($this->get_current_location(), $records->record_found, $this->default_limit_paging, $this->cmodul_name);
        $this->set('pegawai', $pegawai);
        $this->set('records', $records->record_set);
        $this->set('paging_set', $paging_set);
        $this->set('bread_crumb', array(
            "back_end/trpenilaian" => "Penilaian Kinerja",
            "#" => $this->_header_title . " Perilaku Pegawai"
        ));
    }

    public function capaian($id_pegawai) {
        $pegawai = $this->model_master_pegawai->get_pegawai_by_id($id_pegawai);
        $records = $this->model_tr_aktifitas->all($id_pegawai);
        $paging_set = $this->get_paging($this->get_current_location(), $records->record_found, $this->default_limit_paging, $this->cmodul_name);
        $this->set('pegawai', $pegawai);
        $this->set('records', $records->record_set);
        $this->set('paging_set', $paging_set);
        $this->set('bread_crumb', array(
            "back_end/trpenilaian" => "Penilaian Kinerja",
            "#" => $this->_header_title . " Capaian Pegawai"
        ));
    }

}
