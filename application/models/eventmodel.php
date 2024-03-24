<?php

class Eventmodel extends CI_Model {

    function getevents(){

        $query = $this->db->query("select * from events where deleted='f'");
        $head = "<th>Title</th><th>Speaker</th><th>Role</th><th>Date</th>th>Pic</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_hidden = "";
            $form_delete2 = "<a class='btn btn-danger btn-sm' href='deletethisstudent/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_edit2 = "<a class='btn btn-info btn-sm' href='editthisstudent/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_close = form_close();
            $body.="<tr><td>" . $row->title . "</td><td>" . $row->info . "</td><td>" . $row->date. "</td><td>" . $row->pic. "</td><td>" . $form_open . "" . $form_edit2 . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete2 . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["event_count"]=$x;
        return $db_content;

    }

    function uploadevent($imagename) {

        $field["title"] = $this->input->post("title");
        $field["date"] = $this->input->post("date");
        $field["time"] = $this->input->post("time");
        $field["speaker"] = $this->input->post("speaker");
        $field["role"] = $this->input->post("role");    
        $field["location"] = $this->input->post("location");
        $field["pic"] = $imagename;
        $field["info"] = $this->input->post("summary");


        if ($this->db->insert("events", $field)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Event Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Uploading Event ...
                </div>';
        }
    }
    function viewevents() {
        $query = $this->db->query("select * from events where deleted='f'");
        $head = "<th>Event Title</th><th>Date</th><th>Time</th><th>Speaker</th><th>Role</th><th>Photo</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;
        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='editthisevent/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethisevent/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>$row->title</td><td>$row->date</td><td>$row->time</td><td>" . $row->speaker . "</td><td>" . $row->role . "</td><td><img style='width:100%;' height='150px' src='" . base_url() . "/images/" . $row->pic. "' alt=$row->title /></td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["event_count"] = $x;
        return $db_content;
    }
    function deleteevent($id) {
        if ($this->db->query("update events set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Event Information Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting Event Information, Try Again ...
                </div>';
        }
    }

    function editevent($id) {
        $query = $this->db->query("select * from events where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["title"] = $row->title;
            $db_content["speaker"] = $row->speaker;
            $db_content["summary"] = $row->info;
            $db_content["role"] = $row->role;
            $db_content["date"] = $row->date;
            $db_content["time"] = $row->time;
            $db_content["location"] = $row->location;
            $db_content["pic"] = $row->pic;
            $db_content["id"] = $id;
        }



        return $db_content;
    }

    function updateevent($name = array()) {
        $this->db->where('id', $name['id']);
        if ($this->db->update("events", $name)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Event Information Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Event Information...
                </div>';
        }
    }


}

?>
