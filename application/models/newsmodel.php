<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Newsmodel extends CI_Model {

    function insertnews($imagename) {

        $field["name"] = $this->input->post("name");
        $field["photo"] = $imagename;
        $field["description"] = $this->input->post("description");
        $field["date"] = $this->input->post("date");


        if ($this->db->insert("news", $field)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  News Information Posted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error posting news information,Try again!
                </div>';
        }
    }

    function viewnews() {
        $query = $this->db->query("select * from news where deleted='f'");
        $head = "<th>News Title</th><th>Photo</th><th>Description</th><th>Date</th><th>EDIT</th><th>DELETE</th>";
        $body = "";

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='editthisnews/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethisnews/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>$row->name</td><td><img width='150px' height='150px' src='" . base_url() . "/images/" . $row->photo . "' alt='' /></td><td>" . $row->description . "</td><td>" . $row->date . "</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        return $db_content;
    }

    function deletenews($id) {
        if ($this->db->query("update news set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  News Information deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error deleting news information,Try again!
                </div>';
        }
    }

    function editnews($id) {
        $query = $this->db->query("select * from news where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["name"] = $row->name;
            $db_content["photo"] = $row->photo;
            $db_content["date"] = $row->date;
            $db_content["description"] = $row->description;
            $db_content["id"] = $id;
        }



        return $db_content;
    }

    function updatenews($imagename) {

        $field["name"] = $this->input->post("name");
        $field["photo"] = $imagename;
        $field["description"] = $this->input->post("description");
        $field["id"] = $this->input->post("id");


        if ($this->db->replace("news", $field, $field["id"])) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  News Information Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating News information ...
                </div>';
        }
    }

}

?>
