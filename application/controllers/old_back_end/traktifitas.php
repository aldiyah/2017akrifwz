<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Traktifitas extends Back_end {

    public $model = 'model_master_uraian';

    public function __construct() {
        parent::__construct('kelola_master_uraian', 'Uraian Tupoksi');
        $this->load->model('model_master_tupoksi');
    }

    public function index($id_tupoksi = FALSE) {
        if (!$id_tupoksi) {
            redirect('back_end/mstupoksi');
        }
        $detail_tupoksi = $this->model_master_tupoksi->get_detail_by_id($id_tupoksi);
        $this->get_attention_message_from_session();
        $this->model_master_uraian->change_offset_param("currpage_" . $this->cmodul_name);
        $records = $this->model_master_uraian->all($id_tupoksi);

        $paging_set = $this->get_paging($this->get_current_location(), $records->record_found, $this->default_limit_paging, $this->cmodul_name);
        $this->set('records', $records->record_set);
        $this->set('keyword', $records->keyword);
        $this->set('field_id', $this->model_master_uraian->primary_key);
        $this->set('paging_set', $paging_set);
        $this->set('detail_tupoksi', $detail_tupoksi);
        $this->set('additional_js', 'back_end/' . $this->_name . '/js/index_js');
        $this->set('next_list_number', $this->model_master_uraian->get_next_record_number_list());

        $this->set('bread_crumb', array(
            "back_end/mstupoksi" => "Master Tupoksi",
            "#" => $this->_header_title
        ));
    }

    public function detail($id_tupoksi = FALSE, $id_uraian = FALSE) {
        parent::detail($id_uraian, array(
            "tupoksi_id", "uraian_uraian", "uraian_status"
                ), $id_tupoksi);
        $detail_tupoksi = $this->model_master_tupoksi->get_detail_by_id($id_tupoksi);
        $this->set('detail_tupoksi', $detail_tupoksi);
        $this->set('id_tupoksi', $id_tupoksi);
        $this->set('bread_crumb', array(
            "back_end/mstupoksi" => "Master Tupoksi",
            "back_end/" . $this->_name . "/index/" . $id_tupoksi => $this->_header_title,
            "#" => 'Formulir ' . $this->_header_title
        ));
    }

    public function get_like() {
        $keyword = $this->input->post("keyword");
        $kategori_found = $this->model_master_tupoksi->get_like($keyword);
        $this->to_json($kategori_found);
    }

    public function uraian($id = FALSE) {
        $this->load->model('model_master_uraian');
        parent::detail($id, array(
            "tupoksi_nama", "tupoksi_hukum", "tupoksi_tahun", "tupoksi_status"
        ));
        $this->set("bread_crumb", array(
            "back_end/" . $this->_name => $this->_header_title,
            "#" => 'Uraian ' . $this->_header_title
        ));
        $this->set('uraian', $this->model_master_uraian->get_uraian($id));
    }

    public function tambahuraian($id = FALSE) {
        
    }

}
