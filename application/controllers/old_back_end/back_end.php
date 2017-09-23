<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Back_end extends Lwpustaka_data {

    protected $backend_controller_location = "back_end/";
    protected $myid = 0;
    protected $pegawai_id = 0;
    protected $pegawai_nip = 0;
    protected $kode_jabatan = 0;
    protected $kode_organisasi = 0;
    protected $resource_api_link = NULL;

    public function __construct($cmodul_name = FALSE, $header_title = FALSE) {
        $this->is_front_end = FALSE;
        parent::__construct($cmodul_name, $header_title);
        $this->_layout = $this->config->item('application_active_layout');
        $this->resource_api_link = $this->config->item('resource_api_link');
        $this->init_back_end();
        if (!$this->is_authenticated()) {
            redirect('login');
        }
        $this->myid = $this->user_detail['id_user'];
        $this->pegawai_id = $this->user_detail['pegawai_id'] != NULL ? $this->user_detail['pegawai_id'] : 0;
        $this->pegawai_nip = $this->user_detail['pegawai_nip'];
        $this->kode_jabatan = $this->user_detail['kode_jabatan'];
        $this->kode_organisasi = $this->user_detail['kode_organisasi'];
        $this->set('access_rules', $this->access_rules());
    }

    protected function detail($id = FALSE, $posted_data = array(), $parent_id = FALSE) {
//        var_dump(array_diff(array_keys($_POST), $posted_data), $this->{$this->model}->get_data_post(FALSE, $posted_data), $this->{$this->model}->is_valid(), $this->{$this->model});exit;
        if ($this->{$this->model}->get_data_post(FALSE, $posted_data)) {
            if ($this->{$this->model}->is_valid()) {

                $this->before_save_response = $this->before_save($posted_data);

                $saved_id = FALSE;
                if ($this->before_save_response !== FALSE) {
                    $saved_id = $this->save_detail($id);
                }

                $this->after_save_response = $this->after_save($id, $saved_id);

                if (!$id) {
                    $id = $saved_id;
                }

                if ($this->before_save_response) {
                    $this->attention_messages = "Data baru telah disimpan.";
                    if ($id) {
                        $this->attention_messages = "Perubahan telah disimpan.";
                    }
                    if ($parent_id) {
                        redirect('back_end/' . $this->_name . '/index/' . $parent_id);
                    }
                    redirect('back_end/' . $this->_name);
                }
                $this->attention_messages = "Terdapat Kesalahan, Periksa kembali isian anda.";
            } else {
                $this->attention_messages = $this->{$this->model}->errors->get_html_errors("<br />", "line-wrap");
            }
        }

        $detail = $this->{$this->model}->show_detail($id);
//        var_dump($this->db->last_query(), $detail);exit;
        $this->set("detail", $detail);

//        $this->set("bread_crumb", array(
//            "back_end/cjenis_diklat" => 'Jenis Diklat',
//            "#" => 'Pendaftaran Jenis Diklat'
//        ));
//        $this->add_jsfiles(array("avant/plugins/form-jasnyupload/fileinput.min.js"));
    }

    public function _call_api($path, $params) {
        $url = $this->resource_api_link . $path;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type:application/json',
            'Accept:application/json'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $data = curl_exec($ch);
        return (array) json_decode($data);
    }

    private function init_back_end() {
        $this->my_location = "back_end/";
        $this->init_backend_menu();
        $this->backend_controller_location = $this->my_location . $this->_name;
        $this->set("controller_location", $this->backend_controller_location);
    }

}
