<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Custompagemodel extends CI_Model {

    function insertcustompage() {

        $field["name"] = $this->input->post("name");
        $field["date"] = $this->input->post("date");
        $field["content"] = $this->input->post("content");

        if ($this->db->insert("custompages", $field)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Page Created Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Creating Page ...
                </div>';
        }
    }

    function updatecustompage() {

        $field["name"] = $this->input->post("name");
        $field["date"] = $this->input->post("date");
        $field["content"] = $this->input->post("content");

        if ($this->db->replace("custompages", $field)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Page Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Page ...
                </div>';
        }
    }

//custom pages
    function getpages() {
        $query = $this->db->query("select * from custompages");
        $head = "<th>Page Title</th><th>Date</th><th>Content</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;
        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='editthispage/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethispage/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>$row->name</td><td>$row->date</td><td>" . $row->content . "</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["pagesno"] = $x;
        return $db_content;
    }

    function deletepage($id) {
        if ($this->db->query("update custompages set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Page Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error deleting Page, Try again...
                </div>';
        }
    }

    function editpage($id) {
        $query = $this->db->query("select * from custompages where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["name"] = $row->name;
            $db_content["date"] = $row->date;
            $db_content["content"] = $row->content;
            $db_content["id"] = $id;
        }

        return $db_content;
    }

}

?>