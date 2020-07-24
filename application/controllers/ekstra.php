<?php
class ekstra extends CI_controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('m_ekstra');
    }

    public function index(){
        if($this->session->userdata('logged_in') == TRUE){
            $data['konten']="v_ekstra";
            $this->load->model('m_ekstra');
            $data['data_ekstra']=$this->m_ekstra->get_ekstra();
            $this->load->view('admin',$data);
    }
        else{
            $this->load->view('login');
        }
    }

    public function tambah_ekstra(){
        if($this->session->userdata('logged_in') == TRUE){
            $this->form_validation->set_rules('nama', 'nama','trim|required', array('required' => 'nama ekstra harus diisi'));
            
            if ($this->form_validation->run() == TRUE ) 
            {
                $this->load->model('m_ekstra');
                $prosestambah=$this->m_ekstra->tambah_ekstra();
                if($prosestambah==true){
                    $this->session->set_flashdata('pesan','sukses masuk');
                } else{
                    $this->session->set_flashdata('pesan', 'gagal masuk');
                }
                redirect(base_url('index.php/ekstra'),'refresh');
            } else {
                $this->session->set_flashdata('pesan', validation_errors());
                redirect(base_url('index.php/ekstra'), 'refresh');
            }
        }
        else{
            $this->load->view('login');
        }
    }

    public function detail_ekstra($id=''){
            $this->load->model('m_ekstra');
            $data_detail=$this->m_ekstra->detail_ekstra($id);
            echo json_encode($data_detail);
    }

    public function ubah_ekstra(){
        if($this->session->userdata('logged_in') == TRUE){
            $this->form_validation->set_rules('id', 'id', 'trim|required');
            $this->form_validation->set_rules('nama', 'nama','trim|required');

            if ($this->form_validation->run()==FALSE) {
                $this->session->set_flashdata('pesan', validation_errors());
                redirect(base_url('index.php/ekstra'),'refresh');
            }else{
                $this->load->model('m_ekstra');
                $prosesupdate=$this->m_ekstra->ubah_ekstra();
                if($prosesupdate){
                    $this->session->set_flashdata('pesan', 'sukses update');
                }else{
                    $this->session->set_flashdata('pesan', 'gagal update');
                }
                redirect(base_url('index.php/ekstra'),'refresh');
            }
    }
        else{
            $this->load->view('login');
        }
    }

    public function hapus_ekstra($id){
        if($this->session->userdata('logged_in') == TRUE){
            $this->load->model('m_ekstra');
            $prosesdelete = $this->m_ekstra->hapus_ekstra($id);
            if ($prosesdelete == TRUE) {
                $this->session->flashdata('pesan', 'Sukses Hapus Data');
            }else{
                $this->session->flashdata('pesan', 'Gagal Hapus Data');
            }
            redirect(base_url('index.php/ekstra'),'refresh');
    }
        else{
            $this->load->view('login');
        }
    }
}