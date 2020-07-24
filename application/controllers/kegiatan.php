<?php
class kegiatan extends CI_controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('m_kegiatan');
    }

    public function index(){
        if($this->session->userdata('logged_in') == TRUE){
            $data['konten']="v_kegiatan";
            $this->load->model('m_kegiatan');
            $data['data_kegiatan']=$this->m_kegiatan->get_kegiatan();
            $this->load->view('admin',$data);
    }
        else{
            $this->load->view('login');
        }
    }

    public function tambah_kegiatan(){
        if($this->session->userdata('logged_in') == TRUE){
            $this->form_validation->set_rules('nama', 'nama','trim|required', array('required' => 'nama kegiatan harus diisi'));
            
            if ($this->form_validation->run() == TRUE ) 
            {
                $this->load->model('m_kegiatan');
                $prosestambah=$this->m_kegiatan->tambah_kegiatan();
                if($prosestambah==true){
                    $this->session->set_flashdata('pesan','sukses masuk');
                } else{
                    $this->session->set_flashdata('pesan', 'gagal masuk');
                }
                redirect(base_url('index.php/kegiatan'),'refresh');
            } else {
                $this->session->set_flashdata('pesan', validation_errors());
                redirect(base_url('index.php/kegiatan'), 'refresh');
            }
        }
        else{
            $this->load->view('login');
        }
    }

    public function detail_kegiatan($id=''){
            $this->load->model('m_kegiatan');
            $data_detail=$this->m_kegiatan->detail_kegiatan($id);
            echo json_encode($data_detail);
    }

    public function ubah_kegiatan(){
        if($this->session->userdata('logged_in') == TRUE){
            $this->form_validation->set_rules('id', 'id', 'trim|required');
            $this->form_validation->set_rules('nama', 'nama','trim|required');

            if ($this->form_validation->run()==FALSE) {
                $this->session->set_flashdata('pesan', validation_errors());
                redirect(base_url('index.php/kegiatan'),'refresh');
            }else{
                $this->load->model('m_kegiatan');
                $prosesupdate=$this->m_kegiatan->ubah_kegiatan();
                if($prosesupdate){
                    $this->session->set_flashdata('pesan', 'sukses update');
                }else{
                    $this->session->set_flashdata('pesan', 'gagal update');
                }
                redirect(base_url('index.php/kegiatan'),'refresh');
            }
    }
        else{
            $this->load->view('login');
        }
    }

    public function hapus_kegiatan($id){
        if($this->session->userdata('logged_in') == TRUE){
            $this->load->model('m_kegiatan');
            $prosesdelete = $this->m_kegiatan->hapus_kegiatan($id);
            if ($prosesdelete == TRUE) {
                $this->session->flashdata('pesan', 'Sukses Hapus Data');
            }else{
                $this->session->flashdata('pesan', 'Gagal Hapus Data');
            }
            redirect(base_url('index.php/kegiatan'),'refresh');
    }
        else{
            $this->load->view('login');
        }
    }
}