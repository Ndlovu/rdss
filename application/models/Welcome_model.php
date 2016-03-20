<?php
class Welcome_model extends CI_Model
{
        
   public function map_diseases(){
        $sql ="SELECT disease_id as did,county_id as cid ,(SELECT county_name FROM county_table WHERE county_id = cid) as name_of_county, (SELECT disease_name FROM disease_table WHERE disease_id = did) FROM alerts_table";
        $result= $this->db->query($sql);
        return $result->result();

    } 


     public function map_disease_location(){
        $sql ="SELECT county_id as cid ,(SELECT county_name FROM county_table WHERE county_id = cid) as name_of_county FROM alerts_table";
        $result= $this->db->query($sql);
        $alert_location = null;
        if ($result->num_rows()>0) {
            foreach ($result->result() as  $value) {
               $alert_location[] = $value->name_of_county;
            }
            return ($alert_location);
                       
        }
        
    } 



}











?>
