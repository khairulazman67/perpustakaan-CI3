<?php  
	class Hello extends CI_Controller{
		public function index(){
			$this->load->model('Data_perpus');
			$data['admin']=$this->Data_perpus->get_data();

			$this->load->view('V_admin',$data);
		}
	}
?>