<?php
class infologin extends CI_model{
    
	public function get_user(){
		return $this->db->get('user')
						->result();
	}
		
}