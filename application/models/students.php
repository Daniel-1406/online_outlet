<?php

class Students extends CI_Model {

    function adminlogin() {
        $q = $this->db->where("username", $this->input->post("username"))->where("password", md5($this->input->post("password")))->get("admin");
        if ($q->num_rows() > 0) {
            $this->session->set_userdata("admin", $this->input->post("username"));
            return $this->input->post("username");
        } else {
            return "wrong";
        }
    }

    function registerstu($val) {
        if ($this->db->insert("students", $val)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Student\'s Information Uploaded Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Couldn\'t Upload Student\'s Information ...
                </div>';
        }
    }

    function deletestudent($id) {
        if ($this->db->query("update students set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Student\'s Information Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting Student\'s Information Menu ...
                </div>';
        };
    }

    function editstudent($id) {
        $query = $this->db->query("select * from students where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["surname"] = $row->surname;
            $db_content["firstname"] = $row->firstname;
            $db_content["username"] = $row->username;
            $db_content["password"] = $row->password;
            $db_content["gender"] = $row->gender;
            $db_content["studentid"] = $id;
        }



        return $db_content;
    }

    function updatestudents($data) {
        if ($this->db->replace("students", $data)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Student\'s Information Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Student\'s Information ...
                </div>';
        }
    }

    function getAll() {
        $query = $this->db->query("select * from students where deleted='f'");
        $head = "<th>Surname</th><th>Firstname</th><th>Gender</th><th>Time of registration</th><th>EDIT</th><th>DELETE</th>";
        $body = "";

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_hidden = "";
            $form_delete2 = "<a class='btn btn-danger btn-sm' href='deletethisstudent/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
            $form_edit2 = "<a class='btn btn-info btn-sm' href='editthisstudent/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
            $form_close = form_close();
            $body.="<tr><td>" . $row->surname . "</td><td>" . $row->firstname . "</td><td>" . $row->gender . "</td><td>" . $row->regdate . "</td><td>" . $form_open . "" . $form_edit2 . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete2 . "" . $form_close . "</td></tr>";
        }
        $db_content["head"] = $head;
        $db_content["body"] = $body;
        return $db_content;
    }

    function schoolname($name) {
        if ($this->db->replace("schoolinformation", $name)) {
            return "yes";
        } else {
            return "no";
        }
    }

    function getschoolinfo() {
        $query = $this->db->query("select * from schoolinformation");
        $data = array();
        $data["schoolidentity"] = "";
        $data["address"] = "";
        foreach ($query->result() as $row) {
            $data["schoolidentity"] = "<h1><a href='index.html'>$row->schoolname</a></h1><p>$row->schoolmotto</p>";
            $data["address"] = "<div class='one_third'>
        <address>
        $row->schoolname<br>
        $row->address<br>
        $row->nigeirastates State<br>
        <i class='fa fa-phone pright-10'></i>$row->phonenumber<br>
        <i class='fa fa-envelope-o pright-10'></i> <a href='#'>$row->email.com</a>
        </address>
      </div>";
            $data["majorcolor"] = "$row->majorcolour";
            $data["minorcolor"] = "$row->minorcolour";
        }
        return $data;
    }

}

?>
