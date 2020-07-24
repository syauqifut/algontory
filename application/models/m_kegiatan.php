<?php
class m_kegiatan extends CI_model{
    
    public function get_kegiatan(){
        return $this->db->get('kegiatan')
                        ->result();
    }

    public function tambah_kegiatan(){
        $tambah_kegiatan=array(
			'nama'=>$this->input->post('nama'),
			'foto'=>$this->uploadfoto(),
		);
		return $this->db->insert('kegiatan', $tambah_kegiatan);
    }

    public function uploadfoto(){
        $config['upload_path']      = './assets/img/kegiatan/';
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

    public function detail_kegiatan($id){
        return $this->db->where('id', $id)
                        ->get('kegiatan')
                        ->row();
    }
    
    public function ubah_kegiatan(){
		$ubah_kegiatan=array(
            'id'=>$this->input->post('id'),
            'nama'=>$this->input->post('nama'),
			'foto'=>$this->uploadfoto(),
    );
    return $this->db->where('id', $this->input->post('id'))
                    ->update('kegiatan',$ubah_kegiatan);
    }

    public function hapus_kegiatan($id)
	{
        $delete = $this->db->where('id',$id)
                           ->delete('kegiatan');
		if($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
	}

}