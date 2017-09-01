<?php 
class home extends CI_Controller {
	public function index($data='',$offset = FALSE)
	{
		$this->load->model('Chat_model');
		$kode['record'] = $this->Chat_model->select($data);
		
		$this->load->library('pagination');
		$limit=4;
		$config['base_url']= base_url('home/index');
		$config['total_rows']= $this->Chat_model->count();
		$config['per_page']= $limit;
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();
		$data['mobil']= $this->Chat_model->get($limit,$offset);
		$this->load->view('vhome',$data);
	}
	
	public function send_message()
	{
		$config['upload_path']="assets\img\portfolio";
		$config['allowed_types']="jpg|png|gif|jpeg|bmp";
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		if(!$this->upload->do_upload("gambar")){
			echo $this->upload->display_errors();			
			exit();
		}
		$file=$this->upload->data();
		
		$data= array(
		"nickname"=> $this->input->post('nickname'),
		"messages"=> $this->input->post('messages'),
		"gambar"=>$file['file_name']);
		
		$this->load->model('Chat_model');
		$this->Chat_model->simpan($data);
		$this->load->view('vhome');
	}
}