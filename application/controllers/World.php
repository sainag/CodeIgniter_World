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
    //echo "Hello world";
	}
  public function show(){
    echo "I can show my skills";
  }
  public function check($country, $city){
    $this->load->view('worldview',array("country"=>$country,"city"=>$city));
    //echo $city."<br>";
    //echo $country;
  }
  /*public function _remap($method, $params = array())
  {
        if ($method === 'check')
        {
                //$this->$method();
                return call_user_func_array(array($this, $method), $params);
        }
        else
        {
          $newmethod='check';
          if (method_exists($this, $newmethod))
          {
                 return call_user_func_array(array($this, $newmethod), $params);
          }
            //$this->index();
        }
  }*/
}
