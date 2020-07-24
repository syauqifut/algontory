<?php
class prestasi extends CI_controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('m_prestasi');
    }

    public function index(){
        if($this->session->userdata('logged_in') == TRUE){
            $data['konten']="v_prestasi";
            $this->load->model('m_prestasi');
            $data['data_prestasi']=$this->m_prestasi->get_prestasi();
            $this->load->view('admin',$data);
    }
        else{
            $this->load->view('login');
        }
    }

    public function tambah_prestasi(){
        if($this->session->userdata('logged_in') == TRUE){
            $this->form_validation->set_rules('nama', 'nama','trim|required', array('required' => 'nama prestasi harus diisi'));
            
            if ($this->form_validation->run() == TRUE ) 
            {
                $this->load->model('m_prestasi');
                $prosestambah=$this->m_prestasi->tambah_prestasi();
                if($prosestambah==true){
                    $this->session->set_flashdata('pesan','sukses masuk');
                } else{
                    $this->session->set_flashdata('pesan', 'gagal masuk');
                }
                redirect(base_url('index.php/prestasi'),'refresh');
            } else {
                $this->session->set_flashdata('pesan', validation_errors());
                redirect(base_url('index.php/prestasi'), 'refresh');
            }
    }
        else{
            $this->load->view('login');
        }
    }

    public function detail_prestasi($id=''){
            $this->load->model('m_prestasi');
            $data_detail=$this->m_prestasi->detail_prestasi($id);
            echo json_encode($data_detail);
    }

    public function ubah_prestasi(){
        if($this->session->userdata('logged_in') == TRUE){
            $this->form_validation->set_rules('id', 'id', 'trim|required');
            $this->form_validation->set_rules('nama', 'nama','trim|required');

            if ($this->form_validation->run()==FALSE) {
                $this->session->set_flashdata('pesan', validation_errors());
                redirect(base_url('index.php/prestasi'),'refresh');
            }else{
                $this->load->model('m_prestasi');
                $prosesupdate=$this->m_prestasi->ubah_prestasi();
                if($prosesupdate){
                    $this->session->set_flashdata('pesan', 'sukses update');
                }else{
                    $this->session->set_flashdata('pesan', 'gagal update');
                }
                redirect(base_url('index.php/prestasi'),'refresh');
            }
    }
        else{
            $this->load->view('login');
        }
    }

    public function hapus_prestasi($id){
        if($this->session->userdata('logged_in') == TRUE){
            $this->load->model('m_prestasi');
            $prosesdelete = $this->m_prestasi->hapus_prestasi($id);
            if ($prosesdelete == TRUE) {
                $this->session->flashdata('pesan', 'Sukses Hapus Data');
            }else{
                $this->session->flashdata('pesan', 'Gagal Hapus Data');
            }
            redirect(base_url('index.php/prestasi'),'refresh');
    }
        else{
            $this->load->view('login');
        }
    }
}