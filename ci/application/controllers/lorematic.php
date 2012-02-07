<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lorematic extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('lorem');
		$lorem = $this->lorem->get_lorem('3',false);
		$data = array(
			"lorem" => $lorem
		);
		$this->load->view('lorematic', $data);
	}
	
	public function ipsum()
	{
		$this->load->model('lorem');
		$lorem = "lorematic";
		if($this->input->post('type') && $this->input->post('paragraphs')) {
			$pattern = '/^[0-9]{1,2}$/';
			$this->input->post('type') == 'html' ? $type = true : $type = false;
			is_numeric($this->input->post('paragraphs')) && preg_match($pattern, $this->input->post('paragraphs')) && $this->input->post('paragraphs') >= 1 && $this->input->post('paragraphs') <= 20 ? $paragraphs = $this->input->post('paragraphs') : $paragraphs = 3 ; 
			$lorem = $this->lorem->get_lorem($paragraphs,$type);
		}
		$data = array(
			'json'=> array(
				"lorem" => $lorem
			)
		);
		$this->load->view('json',$data);
		
	}
}

/* End of file lorematic.php */
/* Location: ./application/controllers/lorematic.php */