<?php
class m_ekstra extends CI_model{
    
    public function get_ekstra(){
        return $this->db->get('ekstra')
                        ->result();
    }

    public function tambah_ekstra(){
        $tambah_ekstra=array(
			'nama'=>$this->input->post('nama'),
			'foto'=>$this->uploadfoto(),
		);
		return $this->db->insert('ekstra', $tambah_ekstra);
    }

    public function uploadfoto(){
        $config['upload_path']      = './assets/img/ekstra/';
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

    public function detail_ekstra($id){
        return $this->db->where('id', $id)
                        ->get('ekstra')
                        ->row();
    }
    
    public function ubah_ekstra(){
		$ubah_ekstra=array(
            'id'=>$this->input->post('id'),
            'nama'=>$this->input->post('nama'),
			'foto'=>$this->uploadfoto(),
    );
    return $this->db->where('id', $this->input->post('id'))
                    ->update('ekstra',$ubah_ekstra);
    }

    public function hapus_ekstra($id)
	{
        $delete = $this->db->where('id',$id)
                           ->delete('ekstra');
		if($this->db->affected_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
	}

}