<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Chat_model extends CI_Model {  
  
	Public function simpan($data)
	{
		$this->db->insert('messages',$data);
	} 
	public function select($data){
		$this->db->where("id",$data);
		return $this->db->get('messages')->result();
	}
	public function select_all()
	{
		return $this->db->get('messages')->result();
	}	
	public function count(){
		return $this->db->get('messages')->num_rows();
	}
	public function get($limit,$offset){
		return $this->db->get('messages',$limit,$offset)->result();
	}
}