<?php
class login extends CI_controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('user');
    }

    public function index(){
        if($this->session->userdata('logged_in') == TRUE){
			redirect('admin');
		}
		else{
			$this->load->view('login');
		}
    }

    public function proses_login(){
        if($this->session->userdata('logged_in') == FALSE){
			$this->form_validation->set_rules('username','username','trim|required');
			$this->form_validation->set_rules('password','password','trim|required');

			if($this->form_validation->run() == TRUE) {
				if ($this->user->cek_login() == TRUE) {
					redirect('admin');
				}else{
					$this->session->set_flashdata('pesan','Login Gagal');
					redirect('login');
				}
			}else{
				$this->session->set_flashdata('pesan',validation_errors());
				redirect('login');
			}
		}else{
			redirect('index.php/admin');
		}
    }
    public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}