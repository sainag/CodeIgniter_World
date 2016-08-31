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
  public function add_to_world(){
    $country=array('name'=>$this->input->post('country'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'));

    $query=$this->db->get_where('country',array('name'=>$this->input->post('country')));
    $country_id=0;
    if($query->num_rows()){
      foreach ($query->result() as $row)
      {
        $country_id=$row->country_id;
      }
    }
    else
    {
      $query_insert=$this->db->insert('country',$country);
      $country_id=$this->db->insert_id();
    }
    $city=array('name'=>$this->input->post('city'),
                'country_id'=>$country_id,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'));
    $query=$this->db->get_where('city',array('name'=>$this->input->post('city')));
    if($query->num_rows()){
      return;
    }
    else {
      $query_insert=$this->db->insert('city',$city);
      return;
    }
  }
}
?>
