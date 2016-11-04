<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class World extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
  public function index()
	{
		$this->load->model("World_model");
		$data['world']=$this->World_model->get_all();
		$this->load->view('worldview',$data);
  }
  public function create(){
    $this->load->view('create');
  }
  public function store(){
    $this->form_validation->set_rules('country', 'Country', 'required');
    $this->form_validation->set_rules('city', 'City', 'required');
    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('create');
    }
    else
    {
      $this->load->model("World_model");
      $this->World_model->add_to_world();
      $this->index();
    }
  }
  public function show($country){
		$this->load->model("World_model");
		$country_id=$this->World_model->get_country_id($country);
		$data=array('country'=>$country,'country_id'=>$country_id,'cities'=>$this->World_model->get_cities($country_id));
		$this->load->view('countryview',$data);
  }
	public function edit($country_id){
		$this->load->model("World_model");
		$country=$this->World_model->get_country($country_id);
		$data=array('country'=>$country,'country_id'=>$country_id,'cities'=>$this->World_model->get_cities($country_id));
		$this->load->view('country_edit_view',$data);
  }
	public function update(){
		$this->form_validation->set_rules('country', 'Country', 'required');
		foreach ($this->input->post() as $key=>$value){
			if(strpos($key,'city')>-1){
			  $this->form_validation->set_rules($key, 'City', 'required');
		  }
		}
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model("World_model");
      $this->World_model->update();
      $this->show($this->input->post('country'));
    }
  }
	public function delete($item_id,$item_type){
		$this->load->model("World_model");
		$country_id=$this->World_model->delete($item_id,$item_type);
		if($item_type==='country')
			$this->index();
		else {
			$country=$this->World_model->get_country($country_id);
			$this->show($country);
		}
	}
}
