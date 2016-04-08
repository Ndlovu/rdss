<?php
class Alert_model extends CI_Model
{
  function show_alerts()
    {
        $query = $this->db->get('alerts_table');
        $query_result = $query->result();
        return $query_result;
    }

//This function updates the contents of the data held in the disease table
    function update_alert($alert_id, $data)
    {
        $this->db->where('alert_id', $alert_id);
        $this->db->update('alerts_table', $data);
    }


    /*This function adds a commodity to the database*/
    function add_alert($alert = NULL)
    {
        $this->db->insert('alerts_table', $alert);
        return $this->db->insert_id();
    }



  public function show_ussd_disease_report(){
        $sql ="SELECT record_id, age, sex, status, time_stamp, disease_code as did, mfl_code as mfl, (SELECT disease_name FROM disease_table WHERE disease_acronym = did) as disease_name, (SELECT facility_name FROM facility_table WHERE mfl_code = mfl) as facility_name FROM sessions";
        $result= $this->db->query($sql);
        return $result->result();

    } 

        function show_weekly_reports(){

            $sql ="SELECT weekly_record_id, deaths, number_of_cases, start_date, end_date, disease_id as did, facility_id as fid, (SELECT facility_name FROM facility_table WHERE facility_id = fid) as f_name, (SELECT parent_id FROM facility_table WHERE facility_id=fid) as sub_id, (SELECT sub_county_name FROM sub_county_table WHERE sub_county_id=sub_id) as sub_name, (SELECT parent_id FROM sub_county_table WHERE sub_county_id = sub_id) as cid,(SELECT county_name FROM county_table WHERE county_id=cid) as c_name, (SELECT disease_name FROM disease_table WHERE disease_id = did) as d_name FROM weekly_reports";
                $result= $this->db->query($sql);
                return($result->result());

        }


        function show_report_by_user(){

            
        }

   
}
?>

