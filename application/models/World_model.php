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
}
?>
