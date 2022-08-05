<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventmodel extends CI_Model {

    function insertevent($imagename) {

        $field["name"] = $this->input->post("name");
        $field["photo"] = $imagename;
        $field["description"] = $this->input->post("description");
        $field["date"] = $this->input->post("date");


        if ($this->db->insert("event", $field)) {
            return "<span style='color:green;margin-bottom: 80px;padding-left: 20px;padding-top: 10px;font-size: 23px;'>Event information created successfully!</span>";
        } else {
            return "<span style='color:red;margin-bottom: 80px;padding-left: 20px;padding-top: 10px;font-size: 23px;'>Error!,Unable to create event information</span>";
        }
    }

}
?>
