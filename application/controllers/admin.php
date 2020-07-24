<?php
class admin extends CI_controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_prestasi');
        $this->load->model('m_ekstra');
        $this->load->model('m_kegiatan');
        $this->load->model('user');
    }

    public function index(){
        if($this->session->userdata('logged_in') == TRUE){
        $data['konten']="home";
        $data['user'] = $this->user->get_user();
        $this->load->view('admin', $data);
    }
	else{
		$this->load->view('login');
	}
}
}