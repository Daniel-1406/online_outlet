<?php

class students extends CI_Model {

    function adminlogin() {
        $q = $this->db->where("username", $this->input->post("username"))->where("password", ($this->input->post("password")))->get("admin");
        if ($q->num_rows() > 0) {
            $this->session->set_userdata("admin", $this->input->post("username"));
            return $this->input->post("username");
        } else {
            return "wrong";
        }
    }

    function register_stu($val) {
        if ($this->db->insert("students", $val)) {
            return "<span style='color:green;'>Registration successful!</span>";
        } else {
            return "<span style='color:;red'>Unable to register student!<br>Try again!</span>";
        }
    }

    function deletestudent($id) {
        $this->db->query("update students set deleted='t' where id=$id");
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
            $db_content["studentid"] = $row->gender;
        }



        return $db_content;
    }

    function updatestudents($data) {
        if ($this->db->replace("students", $data)) {
            return "<span style='color:green;'>Student's Information Updated successfully!</span>";
        } else {
            return "<span style='color:;red'>Unable to update student's information!<br>Try again!</span>";
        }
    }

    function getAll() {
        $query = $this->db->query("select * from students where deleted='f'");
        $head = "<th>Surname</th><th>Firstname</th><th>Gender</th><th>Time of registration</th><th>EDIT</th><th>DELETE</th>";
        $body = "";

        foreach ($query->result() as $row) {
            $form_open = form_open('welcome/delete');
            $form_hidden = ""; //form_input('del',set_value($row->id,$row->id));
            $form_delete = anchor(base_url('index.php/welcome/deletethisstudent/' . $row->id), form_button('button', 'Delete'));
            $form_edit = anchor(base_url('index.php/welcome/editthisstudent/' . $row->id), form_button('button', 'Edit'));
            $form_close = form_close();
            $body.="<tr><td>" . $row->surname . "</td><td>" . $row->firstname . "</td><td>" . $row->gender . "</td><td>" . $row->regdate . "</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
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
        $data=array();
         $data["schoolidentity"]="";
         $data["address"]="";
        foreach ($query->result() as $row) {
            $data["schoolidentity"] = "<h1><a href='index.html'>$row->schoolname</a></h1><p>$row->schoolmotto</p>";
            $data["address"] = "<div class='one_third'>
        <address>
        $row->schoolname<br>
        $row->address<br>
        $row->city<br>
        $row->postcode<br>
        <br>
        <i class='fa fa-phone pright-10'></i>$row->phonenumber<br>
        <i class='fa fa-envelope-o pright-10'></i> <a href='#'>$row->email.com</a>
        </address>
      </div>";
            //$data["majorcolor"] = "$row->majorcolor";
            //$data["minorcolor"] = "$row->minorcolor";
        }
        return $data;
    }

}

?>
