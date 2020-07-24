<?php
class home extends CI_controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('m_kegiatan');
        $this->load->model('m_ekstra');
        $this->load->model('m_prestasi');
    }

    public function index(){
        $data['data_kegiatan']=$this->m_kegiatan->get_kegiatan();
        $data['data_ekstra']=$this->m_ekstra->get_ekstra();
        $data['data_prestasi']=$this->m_prestasi->get_prestasi();
        $this->load->view('index', $data);
    }
}