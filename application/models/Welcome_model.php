<?php
class Welcome_model extends CI_Model
{
        
    public function map_disease_location(){
        $sql ="SELECT facility_id as fid, (SELECT parent_id FROM facility_table WHERE facility_id = fid) as sub_id, (SELECT parent_id FROM sub_county_table WHERE sub_county_id = sub_id) as cid,(SELECT county_name FROM county_table WHERE county_id = cid) as c_name FROM alerts_table";
        $result= $this->db->query($sql);
        $alert_location = null;
        if ($result->num_rows()>0) {
            foreach ($result->result() as  $value) {
               $alert_location[] = array('location' => $value->c_name);
              }
            return ($alert_location);
                                  
        }
        
    } 



}











?>
