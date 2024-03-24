<?php

class Sermonmodel extends CI_Model {

    function getsermon(){

        $query = $this->db->query("select * from sermon where deleted='f'");
        $head = "<th>Title</th><th>Preacher</th>th>Date</th>th>Message</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_hidden = "";
            $form_delete2 = "<a class='btn btn-danger btn-sm' href='deletethisstudent/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_edit2 = "<a class='btn btn-info btn-sm' href='editthisstudent/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_close = form_close();
            $body.="<tr><td>" . $row->title . "</td><td>" . $row->preacher . "</td><td>" . $row->date. "</td><td>" . $row->message. "</td><td>" . $form_open . "" . $form_edit2 . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete2 . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["sermon_count"]=$x;
        return $db_content;

    }

    function uploadsermon($val) {
        if ($this->db->insert("sermon", $val)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Sermon Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Couldn\'t Upload Sermon Information ...
                </div>';
        }
    }
    function viewsermon() {
        $query = $this->db->query("select * from sermon where deleted='f'");
        $head = "<th>Title</th><th>Date</th><th>Preacher</th><th>Message</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;
        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='editthissermon/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='deletethissermon/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>$row->title</td><td>$row->date</td><td>" . $row->preacher . "</td><td>" . $row->message . "</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["sermon_count"] = $x;
        return $db_content;
    }

    
    function editsermon($id) {
        $query = $this->db->query("select * from sermon where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["title"] = $row->title;
            $db_content["preacher"] = $row->preacher;
            $db_content["date"] = $row->date;
            $db_content["text"] = $row->text;
            $db_content["message"] = $row->message;
            $db_content["id"] = $id;
        }
        return $db_content;
    }

    function updatesermon($name = array()) {
        $this->db->where('id', $name['id']);
        if ($this->db->update("sermon", $name)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Sermon Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Sermon...
                </div>';
        }
    }

    function deletesermon($id) {
        if ($this->db->query("update sermon set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Sermon Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting Sermon, Try Again ...
                </div>';
        }
    }


}

?>
