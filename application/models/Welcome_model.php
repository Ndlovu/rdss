<?php
class Welcome_model extends CI_Model
{
        
    public function map_disease_location(){
        $sql ="SELECT facility_id as fid, (SELECT parent_id FROM facility_table WHERE facility_id = fid) as sub_id, (SELECT parent_id FROM sub_county_table WHERE sub_county_id = sub_id) as cid,(SELECT county_name FROM county_table WHERE county_id = cid) as c_name FROM alerts_table";
        $result= $this->db->query($sql);
        $alert_location = null;
        if ($result->num_rows()>0) {
            foreach ($result->result() as  $value) {
               $alert_location[] = $value->c_name;
              }
            return ($alert_location);
                                  
        }
        
    } 

    public function map_location(){
        $sql ="SELECT facility_id as fid, (SELECT parent_id FROM facility_table WHERE facility_id = fid) as sub_id, (SELECT sub_county_name FROM sub_county_table WHERE sub_county_id = sub_id) as location FROM alerts_table";
        $result= $this->db->query($sql);
        $alert_location = null;
        if ($result->num_rows()>0) {
            foreach ($result->result() as  $value) {
               $alert_location[] = $value->location;
              }
            return ($alert_location);
                                  
        }
        
    } 

    public function show_ussd_disease_report(){
        $sql ="SELECT record_id, age, sex, status, time_stamp, disease_code as did, mfl_code as mfl, (SELECT disease_name FROM disease_table WHERE disease_acronym = did) as disease_name, (SELECT facility_name FROM facility_table WHERE mfl_code = mfl) as facility_name FROM sessions";
        $result= $this->db->query($sql);
        $disease_report = null;
        if($result ->num_rows() > 0){
             $result=$result->result();
            foreach ($result as $alert_item) {
                $disease_report = array("Facility" => $alert_item->facility_name,
                                        "Disease"=>$alert_item->disease_name,
                                        "Age"=>$alert_item->age,
                                        "Sex"=>$alert_item->sex);
            }
            return $disease_report;

        }
       } 

       public function alerts_per_county(){
         $sql ="SELECT disease_id as did, age, sex, status, user_id as id_user, report_date,facility_id as fid, (SELECT parent_id FROM facility_table WHERE facility_id = fid) as sub_id, (SELECT parent_id FROM sub_county_table WHERE sub_county_id = sub_id) as cid,(SELECT sub_county_name FROM sub_county_table WHERE sub_county_id = sub_id) as sub_county_name,(SELECT facility_name FROM facility_table WHERE facility_id = fid) as f_name, (SELECT disease_name FROM disease_table WHERE disease_id = did) as disease_name FROM alerts_table";
         $result = $this->db->query($sql);
         if ($result->num_rows()>0) {
             $result = $result->result();
             return $result;
         }else{return null;}
         
    }


           public function alerts_per_user($user_id){
         $sql ="SELECT alert_id, disease_id as did, age, sex, status, user_id, report_date,facility_id as fid, (SELECT parent_id FROM facility_table WHERE facility_id = fid) as sub_id, (SELECT parent_id FROM sub_county_table WHERE sub_county_id = sub_id) as cid,(SELECT sub_county_name FROM sub_county_table WHERE sub_county_id = sub_id) as sub_county_name,(SELECT facility_name FROM facility_table WHERE facility_id = fid) as f_name, (SELECT disease_name FROM disease_table WHERE disease_id = did) as disease_name FROM alerts_table WHERE user_id = '{$user_id}'";
         $result = $this->db->query($sql);
         if ($result->num_rows()>0) {
             $result = $result->result();
             return $result;
         }else{
            return null;
         }
         
    }


         public function alerts_per_sub_county(){
         $sql ="SELECT disease_id as did, age, sex, status, user_id as id_user, report_date,facility_id as fid, (SELECT parent_id FROM facility_table WHERE facility_id = fid) as sub_id,(SELECT sub_county_name FROM sub_county_table WHERE sub_county_id = sub_id) as sub_county_name,(SELECT facility_name FROM facility_table WHERE facility_id = fid) as f_name, (SELECT disease_name FROM disease_table WHERE disease_id = did) as disease_name FROM alerts_table";
         $result = $this->db->query($sql);
         if ($result->num_rows()>0) {
             $result = $result->result();
             return $result;
         }else{return null;}
         
    }

    public function alerts_by_disease($disease_id){
      $sql = "SELECT disease_id as did, age, sex, status, user_id as id_user, report_date,facility_id as fid, (SELECT parent_id FROM facility_table WHERE facility_id = fid) as sub_id,(SELECT sub_county_name FROM sub_county_table WHERE sub_county_id = sub_id) as sub_county_name,(SELECT facility_name FROM facility_table WHERE facility_id = fid) as f_name, (SELECT disease_name FROM disease_table WHERE disease_id = did) as disease_name FROM alerts_table WHERE disease_id = '{$disease_id}'";
          $result = $this->db->query($sql);
         if ($result->num_rows()>0) {
             $result = $result->result();
             return $result;
         }else{return null;}

    }


    public function get_facilty_alerts($facility_id){
      $sql = "SELECT disease_id as did, age, sex, status, user_id as id_user, report_date,facility_id as fid, (SELECT parent_id FROM facility_table WHERE facility_id = fid) as sub_id,(SELECT sub_county_name FROM sub_county_table WHERE sub_county_id = sub_id) as sub_county_name,(SELECT facility_name FROM facility_table WHERE facility_id = fid) as f_name, (SELECT disease_name FROM disease_table WHERE disease_id = did) as disease_name FROM alerts_table WHERE facility_id = '{$facility_id}'";
      $result = $this->db->query($sql);
         if ($result->num_rows()>0) {
             $result = $result->result();
             return $result;
         }else{return null;}
         
    }

}
?>
