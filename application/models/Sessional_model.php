<?php

/**
 * Created by IntelliJ IDEA.
 * User: urandu
 * Date: 12/25/15
 * Time: 12:50 AM
 */
class Session_model extends CI_Model
{

    public function check_if_session_exists($session_id, $phone_number)
    {
        $this->db->where('session_id', $session_id);
        $this->db->where('phone_number', $phone_number);
        $result = $this->db->get('sessions');

        if ($result->num_rows() > 0) {
            return $result->result()[0];
        } else {
            return false;
        }

    }


    public function new_session($session_id, $phone_number)
    {
        $data = array(
            'session_id' => $session_id,
            'phone_number' => $phone_number
        );
        $this->db->insert('sessions', $data);
    }

    public function check_if_limit_exceeded($phone_number)
    {
        $sql = "SELECT * FROM sessions WHERE phone_number ='" . $phone_number . "' AND time_stamp >= CURDATE() AND time_stamp < CURDATE() + INTERVAL 1 DAY";
        $result = $this->db->query($sql);

        if ($result->num_rows() >= 20) {
            return true;
        } else {
            return false;
        }

    }


    public function save_domain($session_id, $domain_name)
    {
        $data = array(
            'domain_name' => $domain_name,
            'input_step' => 2
        );
        $this->db->where('session_id', $session_id);
        $this->db->update('sessions', $data);
    }

    public function save_extra_information($session_id, $full_name, $id_number, $email_address)
    {
        $data = array(
            'full_name' => $full_name,
            'id_number' => $id_number,
            'email_address' => $email_address
        );

        $this->db->where('session_id', $session_id);
        $this->db->update('sessions', $data);
    }

    public function get_domain_name($session_id)
    {
        $this->db->where('session_id', $session_id);
        $result = $this->db->get('sessions');

        if ($result->num_rows() > 0) {
            return $result->result()[0]->domain_name;
        } else {
            return null;
        }

    }
}