<?php
class user extends CI_model{
    
    public function cek_login(){
        $u = $this->input->post('username');
		$p = $this->input->post('password');

	$query = $this->db->where('username',$u)
					  ->where('password',$p)
					  ->get('user');

	if($this->db->affected_rows() > 0){

		$data_login = $query->row();

		$data_session = array(
							'username' => $data_login->username,
							'password' => $data_login->password,
							'logged_in'=> TRUE
						);

		$this->session->set_userdata($data_session);

		return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function get_user(){
		return $this->db->get('user')
						->result();
	}
}