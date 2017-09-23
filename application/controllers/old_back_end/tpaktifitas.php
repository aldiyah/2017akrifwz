<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tpaktifitas extends Back_end {

    public $model = 'model_tp_aktifitas';

    public function __construct() {
        parent::__construct('kelola_tupoksi_aktifitas', 'Aktifitas Tupoksi');
        $this->load->model(array('model_master_tupoksi', 'model_tp_uraian', 'model_master_aktifitas'));
    }

    public function index($id_uraian = FALSE) {
        if (!$id_uraian) {
            redirect('back_end/mstupoksi');
        }
        $detail_uraian = $this->model_tp_uraian->get_detail_by_id($id_uraian);
        $this->get_attention_message_from_session();
        $this->model_tp_aktifitas->change_offset_param("currpage_" . $this->cmodul_name);
        $records = $this->model_tp_aktifitas->all($id_uraian);

        $paging_set = $this->get_paging($this->get_current_location(), $records->record_found, $this->default_limit_paging, $this->cmodul_name);
        $this->set('records', $records->record_set);
        $this->set('keyword', $records->keyword);
        $this->set('field_id', $this->model_tp_aktifitas->primary_key);
        $this->set('paging_set', $paging_set);
//        $this->set('detail_tupoksi', $detail_tupoksi);
        $this->set('detail_uraian', $detail_uraian);
        $this->set('additional_js', 'back_end/' . $this->_name . '/js/index_js');
        $this->set('next_list_number', $this->model_tp_aktifitas->get_next_record_number_list());

        $this->set('bread_crumb', array(
            "back_end/mstupoksi" => "Master Tupoksi",
            "back_end/tpuraian/index/" . $detail_uraian->tupoksi_id => "Uraian Tupoksi",
            "#" => $this->_header_title
        ));
    }

    public function detail($id_uraian = FALSE, $id_aktifitas = FALSE) {
        parent::detail($id_aktifitas, array(
            "tupoksi_id", "uraian_uraian", "uraian_status"
                ), $id_uraian);
        $detail_uraian = $this->model_tp_uraian->get_detail_by_id($id_uraian);
        $this->set('detail_uraian', $detail_uraian);
        $this->set('id_uraian', $id_uraian);
        $this->set('bread_crumb', array(
            "back_end/mstupoksi" => "Master Tupoksi",
            "back_end/tpuraian/index/" . $detail_uraian->tupoksi_id => "Uraian Tupoksi",
            "back_end/" . $this->_name . "/index/" . $id_uraian => $this->_header_title,
            "#" => 'Formulir ' . $this->_header_title
        ));
    }

    public function get_like() {
        $keyword = $this->input->post("keyword");
        $kategori_found = $this->model_master_tupoksi->get_like($keyword);
        $this->to_json($kategori_found);
    }

//    public function uraian($id = FALSE) {
//        $this->load->model('model_tp_aktifitas');
//        parent::detail($id, array(
//            "tupoksi_nama", "tupoksi_hukum", "tupoksi_tahun", "tupoksi_status"
//        ));
//        $this->set("bread_crumb", array(
//            "back_end/" . $this->_name => $this->_header_title,
//            "#" => 'Uraian ' . $this->_header_title
//        ));
//        $this->set('uraian', $this->model_tp_aktifitas->get_uraian($id));
//    }

    public function pilihaktifitas($id_uraian) {
        $data['aktifitas'] = $this->model_master_aktifitas->all()->record_set;
        $data['id_uraian'] = $id_uraian;
        return $this->load->view('back_end/' . $this->_name . '/pilihaktifitas', $data);
    }

    public function tambahaktifitas($id_uraian, $id_aktifitas) {
        $id = $this->model_tp_aktifitas->tambah_aktifitas($id_uraian, $id_aktifitas);
        $this->to_json($id);
    }

    public function getaktifitas($id_uraian) {
        $result = $this->model_tp_aktifitas->get_aktifitas($id_uraian);
        $data['records'] = $result;
        $data['active_modul'] = $this->_name;
        $data['access_rules'] = $this->access_rules();
        $this->load->view('back_end/' . $this->_name . '/getaktifitas', $data);
    }

}
