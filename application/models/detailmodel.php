<?php

class Detailmodel extends CI_Model {


function uploadchurchfaq($val) {
        if ($this->db->insert("church_faq", $val)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  FAQ Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Couldn\'t Upload FAQ ...
                </div>';
        }
    }

    function getidentifier() {
        $q = $this->db->query("select * from custompage where deleted='f'");
        $dropdown = "<option value='General'>General</option>";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $dropdown.="<option value='" . $r->identifier . "'>" . $r->identifier . "</option>";
            }
        }
        return $dropdown;
    }
    function getidentifierforupdate() {
        $q = $this->db->query("select * from custompage where deleted='f'");
        $mainmenu = array();
        $mainmenu["General"]="General";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $mainmenu[$r->identifier] = $r->identifier;
            }
        }
        return $mainmenu;
    }

    function viewchurchfaq() {
        $query = $this->db->query("select * from church_faq where deleted='f' order by numbering");
        $head = "<th>QUESTION</th><th>ANSWER</th><th>NUMBERING ORDER</th><th>IDENTIFIER</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;
        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='".base_url()."index.php/uploads/details/menupages/editthischurchfaq/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='".base_url()."index.php/uploads/details/menupages/deletethischurchfaq/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>$row->question</td><td>$row->answer</td><td>$row->numbering</td><td>$row->identifier</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["churchfaq_count"] = $x;
        return $db_content;
    }
    function deletechurchfaq($id) {
        if ($this->db->query("update church_faq set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Church FAQ Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting ChurcH FAQ, Try Again ...
                </div>';
        }
    }
    function getchurchfaq($id) {
        $query = $this->db->query("select * from church_faq where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["question"] = $row->question;
            $db_content["answer"] = $row->answer;
            $db_content["numbering"] = $row->numbering;
            $db_content["identifier"] = $row->identifier;
            $db_content["id"] = $id;
        }
        return $db_content;
    }
    function updatechurchfaq($data = array()) {
        $this->db->where('id', $data['id']);
        if ($this->db->update("church_faq", $data)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Church FAQ Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Church FAQ...
                </div>';
        }
    }




    function uploadrcffaq($val) {
        if ($this->db->insert("rcf_faq", $val)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  FAQ Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Couldn\'t Upload FAQ ...
                </div>';
        }
    }
    function viewrcffaq() {
        $query = $this->db->query("select * from rcf_faq where deleted='f' order by numbering");
        $head = "<th>QUESTION</th><th>ANSWER</th><th>NUMBERING ORDER</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;
        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='".base_url()."index.php/uploads/details/menupages/editthisrcffaq/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='".base_url()."index.php/uploads/details/menupages/deletethisrcffaq/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>$row->question</td><td>$row->answer</td><td>$row->numbering</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["rcffaq_count"] = $x;
        return $db_content;
    }
    function deletercffaq($id) {
        if ($this->db->query("update rcf_faq set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible card-body">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  RCF FAQ Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting RCF FAQ, Try Again ...
                </div>';
        }
    }
    function getrcffaq($id) {
        $query = $this->db->query("select * from rcf_faq where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["question"] = $row->question;
            $db_content["answer"] = $row->answer;
            $db_content["numbering"] = $row->numbering;
            $db_content["id"] = $id;
        }
        return $db_content;
    }
    function updatercffaq($data = array()) {
        $this->db->where('id', $data['id']);
        if ($this->db->update("rcf_faq", $data)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  RCF FAQ Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating RCF FAQ...
                </div>';
        }
    }


    function uploadnextstep($val) {
        if ($this->db->insert("next_steps", $val)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Information Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Couldn\'t Upload Information ...
                </div>';
        }
    }
    function getnextstep($id) {
        $query = $this->db->query("select * from next_steps where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["title"] = $row->title;
            $db_content["info"] = $row->info;
            $db_content["numbering"] = $row->numbering;
            $db_content["id"] = $id;
        }
        return $db_content;
    }

    function viewnextstep() {
        $query = $this->db->query("select * from next_steps where deleted='f' order by numbering");
        $head = "<th>TITLE</th><th>NUMBERING</th><th>CONTENT</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;
        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='".base_url()."index.php/uploads/details/menupages/editthisnextstep/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='".base_url()."index.php/uploads/details/menupages/deletethisnextstep/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>$row->title</td><td>$row->numbering</td><td>".$row->info."</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["nextstep_count"] = $x;
        return $db_content;
    }
    function updatenextstep($data = array()) {
        $this->db->where('id', $data['id']);
        if ($this->db->update("next_steps", $data)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Step Information Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Step Information...
                </div>';
        }
    }

    function deletenextstep($id) {
        if ($this->db->query("update next_steps set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible card-body">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Next Step Information Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting Next Step Information, Try Again ...
                </div>';
        }
    }

    function uploadcareer($val) {
        if ($this->db->insert("careers", $val)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Career Information Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Couldn\'t Upload Career Information ...
                </div>';
        }
    }
    function viewcareer() {
        $query = $this->db->query("select * from careers where deleted='f'");
        $head = "<th>TITLE</th><th>LOCATION</th><th>DESCRIPTION</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;
        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='".base_url()."index.php/uploads/details/menupages/editthiscareer/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='".base_url()."index.php/uploads/details/menupages/deletethiscareer/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>$row->title</td><td>$row->location</td><td>$row->description</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["rcffaq_count"] = $x;
        return $db_content;
    }
    function getcareer($id) {
        $query = $this->db->query("select * from careers where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["title"] = $row->title;
            $db_content["location"] = $row->location;
            $db_content["description"] = $row->description;
            $db_content["id"] = $id;
        }
        return $db_content;
    }

    function updatecareer($data = array()) {
            $this->db->where('id', $data['id']);
            if ($this->db->update("careers", $data)) {
                return '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-check"></i> Success!</h5>
                      Career Information Updated Successfully ...
                    </div>';
            } else {
                return '<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-ban"></i> Error!</h5>
                      Error Updating Step Career...
                    </div>';
            }
        }
    function deletecareer($id) {
        if ($this->db->query("update careers set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible card-body">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Career Information Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting Career Information, Try Again ...
                </div>';
        }
    }

    function uploadprayerresources($val) {
        if ($this->db->insert("prayer_resources", $val)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Prayer Resource Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Couldn\'t Upload Prayer Resource ...
                </div>';
        }
    }
    function viewprayerresources() {
        $query = $this->db->query("select * from prayer_resources where deleted='f'");
        $head = "<th>TITLE</th><th>DOCUMENT</th><th>EDIT</th><th>DELETE</th>";
        $body = "";
        $x=0;
        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_edit = "<a class='btn btn-info btn-sm' href='".base_url()."index.php/uploads/details/menupages/editthisprayerresources/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_delete = "<a class='btn btn-danger btn-sm' href='".base_url()."index.php/uploads/details/menupages/deletethisprayerresources/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_close = form_close();
            $body.="<tr><td>$row->title</td><td><iframe src='" . base_url() . "/images/" . $row->document . "' alt='$row->title'></iframe></td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
        $x++;
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        $db_content["prayerresources_count"] = $x;
        return $db_content;
    }
    function deleteprayerresources($id) {
        if ($this->db->query("update prayer_resources set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible card-body">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Prayer Resource Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting Prayer Resource, Try Again ...
                </div>';
        }
    }
    function getprayerresources($id) {
        $query = $this->db->query("select * from prayer_resources where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["title"] = $row->title;
            $db_content["document"] = $row->document;
            $db_content["id"] = $id;
        }
        return $db_content;
    }
    function updateprayerresources($data = array()) {
        $this->db->where('id', $data['id']);
        if ($this->db->update("prayer_resources", $data)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Prayer Information Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Prayer Information...
                </div>';
        }
    }
}