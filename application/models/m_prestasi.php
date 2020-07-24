<?php
class m_prestasi extends CI_model{
    
    public function get_prestasi(){
        return $this->db->get('prestasi')
                        ->result();
    }

    public function tambah_prestasi(){
        $tambah_prestasi=array(
			'nama'=>$this->input->post('nama'),
			'foto'=>$this->uploadfoto(),
		);
		return $this->db->insert('prestasi', $tambah_prestasi);
    }

    public function uploadfoto(){
        $config['upload_path']      = './assets/img/prestasi/';
		$config['allowed_types']    = 'gif|jpg|png|jpeg';
		$config['max_size']         = '10240';
        $config['overwrite']        = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }
        else{
            print_r($this->upload->display_errors());
        }
    }

    public function detail_prestasi($id){
        return $this->db->where('id', $id)
                        ->get('prestasi')
                        ->row();
    }
    
    public function ubah_prestasi(){
		$ubah_prestasi=array(
            'id'=>$this->input->post('id'),
            'nama'=>$this->input->post('nama'),
			'foto'=>$this->uploadfoto(),
    );
    return $this->db->where('id', $this->input->post('id'))
                    ->update('prestasi',$ubah_prestasi);
    }

    public function hapus_prestasi($id)
	{
        $delete = $this->db->where('id',$id)
                           ->delete('prestasi');
		if($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
	}

}