<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Carouselmodel extends CI_Model {

    function insertcarousel() {

        $field["name"] = $this->input->post("name");
        $field["date"] = $this->input->post("date");
        $field["content"] = $this->input->post("content");
        
        if ($this->db->insert("custompages", $field)) {
            return "<span style='color:green;margin-bottom: 80px;padding-left: 20px;padding-top: 10px;font-size: 23px;'>Carousel created successfully!</span>";
        } else {
            return "<span style='color:red;margin-bottom: 80px;padding-left: 20px;padding-top: 10px;font-size: 23px;'>Error!,Unable to create carousel</span>";
        }
    }
} 
    ?>