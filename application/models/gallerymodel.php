<?php

class Gallerymodel extends CI_Model {

    function getgallery(){

        $query = $this->db->query("select * from gallery where deleted='f'");
        $head = "<th>Name</th><th>Caption</th>th>Category</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_hidden = "";
            $form_delete2 = "<a class='btn btn-danger btn-sm' href='deletethisstudent/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_edit2 = "<a class='btn btn-info btn-sm' href='editthisstudent/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_close = form_close();
            $body.="<tr><td>" . $row->name . "</td><td>" . $row->caption . "</td><td>" . $row->category. "</td><td>" . $form_open . "" . $form_edit2 . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete2 . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["gallery_count"]=$x;
        return $db_content;

    }
    function uploadgallery($imagename) {

        $field["caption"] = $this->input->post("caption");
        $field["name"] = $imagename;
        $field["category"] = $this->input->post("category");


        if ($this->db->insert("gallery", $field)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Photo Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Uploading Photo ...
                </div>';
        }
    }

    function viewgallery() {
        $query = $this->db->query("select * from gallery where deleted='f' ");
        $head = "<th>Photo</th><th>Caption</th><th>Category</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='editthisgallery/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethisgallery/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td><img style='width:100%;' height='150px' src='" . base_url() . "/images/" . $row->name . "' alt=$row->caption /></td><td>" . $row->caption . "</td><td>" . $row->category . "</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["linkcount"] = $x;
        return $db_content;
    }
    function deletegallery($id) {
        if ($this->db->query("update gallery set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Photo Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting photo, Try Again ...
                </div>';
        }
    }

    function editgallery($id) {
        $query = $this->db->query("select * from gallery where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["name"] = $row->name;
            $db_content["caption"] = $row->caption;
            $db_content["category"] = $row->category;
            $db_content["id"] = $id;
        }



        return $db_content;
    }

    function updategallery($name = array()) {
        $this->db->where('id', $name['id']);
        if ($this->db->update("gallery", $name)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Photo Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Photo...
                </div>';
        }
    }



}

?>
