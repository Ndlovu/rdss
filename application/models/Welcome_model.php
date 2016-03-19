<?php
class Welcome_model extends CI_Model
{
        
   public function map_diseases(){
        $sql ="SELECT disease_id as did,county_id as cid ,(SELECT county_name FROM county_table WHERE county_id = cid) as name_of_county, (SELECT disease_name FROM disease_table WHERE disease_id = did) FROM alerts_table";
        $result= $this->db->query($sql);
        return $result->result();

    } 
    

}
?>
