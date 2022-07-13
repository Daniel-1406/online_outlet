<?php

class Menumodel extends CI_Model {

    function getmainmenu() {
        $q = $this->db->query("select * from menu where orientation='Main' and deleted='f'");
        //question here
        $mainmenu = "<option value='Main'>Main</option>";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $mainmenu.="<option value='" . $r->id . "'>" . $r->name . "</option>";
            }
        }
        return $mainmenu;
    }

    function registermenu() {
        $data["name"] = $this->input->post("name");
        $data["url"] = $this->input->post("url");
        $data["orientation"] = $this->input->post("orientation");
        $data["status"] = $this->input->post("status");
        $data["numbering"] = $this->input->post("numbering");

        if ($this->db->insert("menu", $data)) {
            return "<span style='color:green;margin-bottom: 80px;padding-left: 20px;padding-top: 10px;font-size: 23px;'>Menu created successfully!</span>";
        } else {
            return "<span style='color:red;margin-bottom: 80px;padding-left: 20px;padding-top: 10px;font-size: 23px;'>Error!,Unable to create menu</span>";
        }
    }

    function getsubmenu($menuid) {
        $q = $this->db->query("select * from menu where orientation=$menuid and deleted='f' order by numbering");
        if ($q->num_rows() > 0) {
            $sublist = "<ul>";
            foreach ($q->result() as $sub) {
                $sublist.="<li><a href='$sub->url'>$sub->name</a></li>";
            }
            $sublist.="</ul>";
            return $sublist;
        } else {
            return false;
        }
    }

    function getpagemenu() {
        $q = $this->db->query("select * from menu where orientation='Main' and deleted='f' order by numbering");
        $menu = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $res) {
                $submenu = $this->getsubmenu($res->id);
                if (!$menu) {
                    $menu.="<li class=''><a href='$res->url'>$res->name</a></li>";
                } else {
                    $menu.="<li><a class='drop' href='$res->url'>$res->name</a>" . $submenu . "</li>";
                }
            }
        }
        return $menu;
    }

    function getsubmenuforview($menuid) {
        $q = $this->db->query("select * from menu where orientation=$menuid and deleted='f' order by numbering");
        if ($q->num_rows() > 0) {
            $body = "";
            foreach ($q->result() as $row) {
                $form_open = form_open('welcome/delete');
                $form_hidden = ""; //form_input('del',set_value($row->id,$row->id));
                $form_delete = anchor(base_url('index.php/welcome/deletethisstudent/' . $row->id), form_button('button', 'Delete'));
                $form_edit = anchor(base_url('index.php/welcome/editthisstudent/' . $row->id), form_button('button', 'Edit'));
                $form_close = form_close();
                $body.="<tr><td>$row->name</td><td>$row->url</td><td>$row->status</td><td>$row->numbering</td><td>" . $form_open . "" . $form_edit . "" . $form_close . "</td   ><td>" . $form_open . "" . $form_delete . "" . $form_close . "</td></tr>";
            }

            return $body;
        } else {
            return false;
        }
    }

    function getpagemenuforview() {
        $q = $this->db->query("select * from menu where orientation='Main' and deleted='f' order by numbering");
        $head = "<th>NAME</th><th>URL</th><th>STATUS</th><th>NUMBERING</th><th>EDIT</th><th>DELETE</th>";

        $body = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $res) {
                $submenu = $this->getsubmenu($res->id);
                $form_open = form_open('welcome/delete');
                $form_hidden = ""; //form_input('del',set_value($row->id,$row->id));
                $form_delete = anchor(base_url('index.php/welcome/deletethisstudent/' . $res->id), form_button('button', 'Delete'));
                $form_edit = anchor(base_url('index.php/welcome/editthisstudent/' . $res->id), form_button('button', 'Edit'));
                $form_close = form_close();
                $submenu = $this->getsubmenuforview($res->id);
                if (!$submenu) {
                    $body .="<th>$res->name</th><th>$res->url</th><th>$res->status</th><th>$res->numbering</th><th>" . $form_open . "" . $form_edit . "" . $form_close . "</th><th>" . $form_open . "" . $form_delete . "" . $form_close . "</th></tr>";
                } else {
                    $body .="<th>$res->name</th><th>$res->url</th><th>$res->status</th><th>$res->numbering</th><th>" . $form_open . "" . $form_edit . "" . $form_close . "</th><th>" . $form_open . "" . $form_delete . "" . $form_close . "</th></tr>" . $submenu;
                }
            }
            $table["head"] = $head;
            $table["body"] = $body;
        }
        return $table;
    }

}

?>
