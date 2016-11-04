<?php
class World_model extends CI_Model {
  public function __construct(){
    parent::__construct();
  }
  public function get_all(){
    $query=$this->db->get('country');
    $world=[];
    foreach ($query->result() as $row)
    {
      $cities=$this->get_cities($row->country_id);
      $world[]=array('country_id'=>$row->country_id,
                    'country_name'=>$row->name,
                    'cities'=>$cities,
                    'created_at'=>$row->created_at,
                    'updated_at'=>$row->updated_at);
    }
    return $world;
  }
  public function get_cities($country_id){
    $query=$this->db->get_where('city',array('country_id'=>$country_id));
    $cities=[];
    foreach ($query->result() as $row)
    {
      $cities[]=array('city_id'=>$row->city_id,
                    'city_name'=>$row->name,
                    'created_at'=>$row->created_at,
                    'updated_at'=>$row->updated_at);
    }
    return $cities;
  }
  public function get_countries(){
    $query=$this->db->get('country');
    return $query->result();
  }
  public function get_country_id($country){
    $query=$this->db->get_where('country',array('name'=>$country));
    foreach ($query->result() as $row)
    {
      return $row->country_id;
    }
  }
  public function get_country($country_id){
    $query=$this->db->get_where('country',array('country_id'=>$country_id));
    foreach ($query->result() as $row)
    {
      return $row->name;
    }
  }
  public function add_to_world(){
    $country=array('name'=>$this->input->post('country'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'));

    $query=$this->is_country_exist($this->input->post('country'));
    $country_id=$query;
    if(! $country_id)
    {
      $query_insert=$this->db->insert('country',$country);
      $country_id=$this->db->insert_id();
    }
    $city=array('name'=>$this->input->post('city'),
                'country_id'=>$country_id,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'));
    $query=$this->is_city_exist($this->input->post('city'));
    if($query){
      return;
    }
    else {
      $query_insert=$this->db->insert('city',$city);
      return;
    }
  }
  public function update(){
    $this->db->set('name', $this->input->post('country'));
    $this->db->set('updated_at', date('Y-m-d H:i:s'));
    $this->db->where('country_id', $this->input->post('country_id'));
    $this->db->update('country');
    foreach ($this->input->post() as $key=>$value){
			if(strpos($key,'city')>-1){
        $this->db->set('name', $value);
        $this->db->set('updated_at', date('Y-m-d H:i:s'));
        $this->db->where('city_id', str_replace('city','',$key));
        $this->db->update('city');
		  }
		}
    return;
  }
  public function delete($item_id,$item_type){
    if($item_type==='country'){
      $this->db->where('country_id',$item_id);
      $this->db->delete('country');
      $this->db->where('country_id',$item_id);
      $this->db->delete('city');
      return;
    }
    else{
      $query=$this->db->get_where('city',array('city_id'=>$item_id));
      foreach ($query->result() as $row)
      {
        $country_id= $row->country_id;
      }
      $this->db->where('city_id',$item_id);
      $this->db->delete('city');
      return $country_id;
    }
  }
  public function is_country_exist($country){
    $query=$this->db->get_where('country',array('name'=>$country));
    if($query->num_rows()){
      $row = $query->row();
      return $row->country_id;
    }
    else {
      return FALSE;
    }
  }
  public function is_city_exist($city){
    $query=$this->db->get_where('city',array('name'=>$city));
    if($query->num_rows()){
      return TRUE;
    }
    else {
      return FALSE;
    }
  }
}
?>
