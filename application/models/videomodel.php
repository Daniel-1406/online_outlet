<?php

class Videomodel extends CI_Model {

    function uploadvideo($audioname) {

        $field["topic"] = $this->input->post("topic");
        $field["speaker"] = $this->input->post("speaker");
        $field["summary"] = $this->input->post("summary");
        $field["date"] = $this->input->post("date");
        $field["link"] = $this->input->post("link");
        $field["pic"] = $audioname;


        if ($this->db->insert("videos", $field)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Video Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Uploading Audio ...
                </div>';
        }
    }
    function viewvideos() {
        $query = $this->db->query("select * from videos where deleted='f' ");
        $head = "<th>Header</th><th>Speaker</th><th>Summary</th><th>Date</th><th>Link</th><th>Overlay Photo</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='editthisvideo/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethisvideo/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>" . $row->topic . "</td><td>" . $row->speaker . "</td><td>" . $row->summary . "</td><td>" . $row->date . "</td><<td>" . $row->link . "</td><td><img style='width:100%;' height='150px' src='" . base_url() . "/images/" . $row->pic . "' alt=$row->topic /></td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["videocount"] = $x;
        return $db_content;
    }

    function deletevideo($id) {
        if ($this->db->query("update videos set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Video Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting Video, Try Again ...
                </div>';
        }
    }

    function editvideo($id) {
        $query = $this->db->query("select * from videos where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["topic"] = $row->topic;
            $db_content["speaker"] = $row->speaker;
            $db_content["summary"] = $row->summary;
            $db_content["pic"] = $row->pic;
            $db_content["date"] = $row->date;
            $db_content["link"] = $row->link;
            $db_content["id"] = $id;
        }



        return $db_content;
    }

    function updatevideo($name = array()) {
        $this->db->where('id', $name['id']);
        if ($this->db->update("videos", $name)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Video Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Video...
                </div>';
        }
    }


}

?>
