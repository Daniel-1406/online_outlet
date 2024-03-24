<?php

class Churchinfo extends CI_Model {

    function getchurchinformation()
    {
        $qq = $this->db->get("about");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["name"] = $row->name;
            $record["heading"] = $row->heading;
            $record["information"] = $row->information;
            $record["address"] = $row->address;
            $record["telephone"] = $row->telephone;
            $record["twitter"] = $row->twitter;
            $record["facebook"] = $row->facebook;
            $record["instagram"] = $row->instagram;
            $record["youtube"] = $row->youtube;
            $record["googlemap"] = $row->googlemap;
            $record["email"] = $row->email;
            $record["maj_color"] = $row->maj_color;
            $record["min_color"] = $row->min_color;
        } else {
            $record["name"] = "";
            $record["heading"] = "";
            $record["information"] = "";
            $record["address"] = "";
            $record["telephone"] = "";
            $record["twitter"] = "";
            $record["facebook"] = "";
            $record["instagram"] = "";
            $record["youtube"] = "";
            $record["googlemap"] = "";
            $record["email"] ="";
            $record["maj_color"] ="";
            $record["min_color"] ="";
        }
        return $record;
    }


    function updatechurchinfo()
    {
        $val["name"] = $this->input->post("name");
        $val["heading"] = $this->input->post("heading");
        $val["email"] = $this->input->post("email");
        $val["information"] = $this->input->post("information");
        $val["address"] = $this->input->post("address");
        $val["googlemap"] = $this->input->post("googlemap");
        $val["maj_color"] = $this->input->post("maj_color");
        $val["min_color"] = $this->input->post("min_color");
        $val["telephone"] = $this->input->post("telephone");
        $val["facebook"] = $this->input->post("facebook");
        $val["twitter"] = $this->input->post("twitter");
        $val["youtube"] = $this->input->post("youtube");
        $val["instagram"] = $this->input->post("instagram");
        $this->db->query("truncate about");
        $this->db->insert("about", $val);
        return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Church Information Updated Successfully ...
                </div>';
    }

}

?>
