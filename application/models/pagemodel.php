<?php

class Pagemodel extends CI_Model {

    function uploadpage($val) {
        if ($this->db->insert("custompage", $val)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Page Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Couldn\'t Upload Page...
                </div>';
        }
    }
    function viewpages() {
        $query = $this->db->query("select * from custompage where deleted='f' ");
        $head = "<th>Page Title</th><th>Identifier</th><th>Banner</th><th>Date</th><th>Content</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;
        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='editthispage/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethispage/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>$row->name</td><td>$row->date</td><td>$row->identifier</td><td><img style='width:100%;' height='150px' src='" . base_url() . "/images/" . $row->banner . "' alt=$row->identifier /></td><td>" . $row->content . "</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["pages_count"] = $x;
        return $db_content;
    }

    function deletepage($id) {
        if ($this->db->query("update custompage set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Page Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting Page, Try Again ...
                </div>';
        }
    }
    function editpage($id) {
        $query = $this->db->query("select * from custompage where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["name"] = $row->name;
            $db_content["content"] = $row->content;
            $db_content["banner"] = $row->banner;
            $db_content["identifier"] = $row->identifier;
            $db_content["date"] = $row->date;
            $db_content["id"] = $id;
        }
        return $db_content;
    }

    function updatepage($name = array()) {
        $this->db->where('id', $name['id']);
        if ($this->db->update("custompage", $name)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Page Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Page...
                </div>';
        }
    }



}

?>
