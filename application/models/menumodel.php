<?php

class Menumodel extends CI_Model {

    function getsubmenuforview($menuid) {
        $q = $this->db->query("select * from menu where orientation=$menuid and deleted='f' order by numbering");
        if ($q->num_rows() > 0) {
            $body = "";
            foreach ($q->result() as $res) {
                $form_open = form_open('welcome/delete');
                $form_hidden = ""; //form_input('del',set_value($row->id,$row->id));
                $form_delete2 = "<a class='btn btn-danger btn-sm' href='deletethismenu/$res->id'><i class='fas fa-trash'> </i>Delete</a>";
                $form_edit2 = "<a class='btn btn-info btn-sm' href='editthismenu/$res->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
                $form_close = form_close();
                $childmenu = $this->getchildmenuforview($res->id);

                if (!$childmenu) {
                    $body .="<th>$res->name</th><th>$res->url</th><th>$res->status</th><th>$res->numbering</th><th>" . $form_open . "" . $form_edit2 . "" . $form_close . "</th><th>" . $form_open . "" . $form_delete2 . "" . $form_close . "</th></tr>";
                } else {
                    $body .="<th>$res->name</th><th>$res->url</th><th>$res->status</th><th>$res->numbering</th><th>" . $form_open . "" . $form_edit2 . "" . $form_close . "</th><th>" . $form_open . "" . $form_delete2 . "" . $form_close . "</th></tr>" . $childmenu;
                }
            }

            return $body;
        } else {
            return false;
        }
    }

    function getchildmenuforview($menuid) {
        $q = $this->db->query("select * from menu where orientation=$menuid and deleted='f' order by numbering");
        if ($q->num_rows() > 0) {
            $body = "";
            foreach ($q->result() as $row) {
                $form_open = form_open('welcome/delete');
                $form_hidden = ""; //form_input('del',set_value($row->id,$row->id));
                $form_delete2 = "<a class='btn btn-danger btn-sm' href='deletethismenu/$row->id'><i class='fas fa-trash'> </i>Delete</a>";
                $form_edit2 = "<a class='btn btn-info btn-sm' href='editthismenu/$row->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
                $form_close = form_close();

                


                $body.="<tr><td>$row->name</td><td>$row->url</td><td>$row->status</td><td>$row->numbering</td><td>" . $form_open . "" . $form_edit2 . "" . $form_close . "</td   ><td>" . $form_open . "" . $form_delete2 . "" . $form_close . "</td></tr>";
            }

            return $body;
        } else {
            return false;
        }
    }

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

    function getsubmenus() {
        $q = $this->db->query("select * from menu where not orientation='Main' and deleted='f'");
        //question here
        $mainmenu = "<option value='none'>none</option>";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $mainmenu.="<option value='" . $r->id . "'>" . $r->name . "</option>";
            }
        }
        return $mainmenu;
    }


    
    function viewmenu() {
        $q = $this->db->query("select * from menu where orientation='Main' and deleted='f' order by numbering");
        $head = "<th>NAME</th><th>URL</th><th>STATUS</th><th>NUMBERING</th><th>EDIT</th><th>DELETE</th>";

        $body = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $res) {
                $x=1;
                //$submenu = $this->getsubmenu($res->id);
                $form_open = form_open('welcome/delete');
                $form_delete = anchor(base_url('index.php/welcome/deletethisstudent/' . $res->id), form_button('button', 'Delete'));
                $form_edit = anchor(base_url('index.php/welcome/editthisstudent/' . $res->id), form_button('button', 'Edit'));
                $form_delete2 = "<a class='btn btn-danger btn-sm' href='deletethismenu/$res->id'><i class='fas fa-trash'> </i>Delete</a>";
                $form_edit2 = "<a class='btn btn-info btn-sm' href='editthismenu/$res->id'><i class='fas fa-pencil-alt'></i>Edit </a>";
                $form_close = form_close();
                $submenu = $this->getsubmenuforview($res->id);
                if (!$submenu) {
                    $body .="<th style='background:yellow;'>".strtoupper($res->name)."</th><th>".strtoupper($res->url)."</th><th>".strtoupper($res->status)."</th><th>".strtoupper($res->numbering)."</th><th>" . $form_open . "" . $form_edit2 . "" . $form_close . "</th><th>" . $form_open . "" . $form_delete2 . "" . $form_close . "</th></tr>";
                } else {
                    $body .="<th style='background:yellow;'>".strtoupper($res->name)."</th><th>".strtoupper($res->url)."</th><th>".strtoupper($res->status)."</th><th>".strtoupper($res->numbering)."</th><th>" . $form_open . "" . $form_edit2 . "" . $form_close . "</th><th>" . $form_open . "" . $form_delete2 . "" . $form_close . "</th></tr>" . $submenu;
                }
                $x++;
            }
            $table["head"] = $head;
            $table["body"] = $body;
            $table["menu_count"] = $x;
        }
        return $table;
    }

    function deletemenu($id) {
        if ($this->db->query("update menu set deleted='t' where id=$id")) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Menu Deleted Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Deleting Menu, Try Again ...
                </div>';
        }
    }
    function editmenu($id) {
        $query = $this->db->query("select * from menu where id=$id");
        $db_content = array();
        foreach ($query->result() as $row) {
            $db_content["name"] = $row->name;
            $db_content["url"] = $row->url;
            $db_content["orientation"] = $row->orientation;
            $db_content["status"] = $row->status;
            $db_content["numbering"] = $row->numbering;
            $db_content["id"] = $id;
        }



        return $db_content;
    }
    function mainmenuforupdate() {
        $q = $this->db->query("select * from menu where orientation='main' and deleted='f'");
        $mainmenu = array();
        $mainmenu["Main"]="Main";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $mainmenu[$r->id] = $r->name;
            }
        }
        return $mainmenu;
    }
    function submenuforupdate() {
        $q = $this->db->query("select * from menu where not orientation='main' and deleted='f'");
        $mainmenu = array();
        $mainmenu["none"]="None";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $mainmenu[$r->id] = $r->name;
            }
        }
        return $mainmenu;
    }

    function updatemenu($name = array()) {
        $this->db->where('id', $name['id']);
        if ($this->db->update("menu", $name)) {
            return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Menu Updated Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Updating Menu...
                </div>';
        }
    }

    function uploadmenu() {
        if($this->input->post("suborientation")=="none"){
            $orientation=$this->input->post("orientation");

        }else{
            $orientation=$this->input->post("suborientation");

        }
        $data["name"] = $this->input->post("name");
        $data["url"] = $this->input->post("url");
        $data["orientation"] = $orientation;
        $data["status"] = $this->input->post("status");
        $data["numbering"] = $this->input->post("numbering");

        if ($this->db->insert("menu", $data)) {
            return '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Menu Upload Successfully ...
                </div>';
        } else {
            return '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Error!</h5>
                  Error Uploading Menu ...
                </div>';
        }
    }



}

?>
