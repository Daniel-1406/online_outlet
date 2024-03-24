<?php

class Servicemodel extends CI_Model {

    // function getservices(){

    //     $query = $this->db->query("select * from mini_carousel where deleted='f'");
    //     $head = "<th>Text</th><th>Label</th>th>Numbering</th><th>Picture</th><th>EDIT</th><th>DELETE</th>";
    //     $body = "";
    //     $x=0;

    //     foreach ($query->result() as $row) {
    //         $form_open = form_open('welcome/delete');
    //         $form_hidden = "";
    //         $form_delete2 = "<a class='btn btn-danger btn-sm' href='deletethisstudent/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
    //         $form_edit2 = "<a class='btn btn-info btn-sm' href='editthisstudent/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
    //         $form_close = form_close();
    //         $body.="<tr><td>" . $row->text . "</td><td>" . $row->label . "</td><td>" . $row->numbering. "</td><td>" . $row->pic. "</td><td>" . $form_open . "" . $form_edit2 . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete2 . "" . $form_close . "</td></tr>";
    //     $x++;
    //     }
    //     $db_content["head"] = $head;
    //     $db_content["body"] = $body;
    //     $db_content["service_count"]=$x;
    //     return $db_content;

    // }

    function uploadservice($imagename) {

        $field["title"] = $this->input->post("title");
        $field["pic"] = $imagename;
        $field["duration"] = $this->input->post("duration");


        if ($this->db->insert("services", $field)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Program Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Uploading Program ...
                </div>';
        }
    }

    function viewservices() {
        $query = $this->db->query("select * from services where deleted='f'");
        $head = "<th>Title</th><th>Duration</th><th>Photo</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;
        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='editthisservice/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethisservice/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>$row->title</td><td>$row->duration</td><td><img style='width:100%;' height='150px' src='" . base_url() . "/images/" . $row->pic. "' alt=$row->title /></td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["service_count"] = $x;
        return $db_content;
    }
    function editservice($id) {
        $query = $this->db->query("select * from services where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["title"] = $row->title;
            $db_content["duration"] = $row->duration;
            $db_content["pic"] = $row->pic;
            $db_content["id"] = $id;
        }



        return $db_content;
    }

    function updateservice($name = array()) {
        $this->db->where('id', $name['id']);
        if ($this->db->update("services", $name)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Program Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Program...
                </div>';
        }
    }

    function deleteservice($id) {
        if ($this->db->query("update services set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Program Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting Program, Try Again ...
                </div>';
        }
    }



}

?>
