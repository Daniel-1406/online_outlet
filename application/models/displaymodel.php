<?php

class Displaymodel extends CI_Model {

    function getmission()
    {
        $qq = $this->db->get("pg_mission");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["content"] = $row->content;
           
        } else {
            $record["content"] = "";
        }
        return $record;
    }
    function updatemission($data)
    {
        $this->db->query("truncate pg_mission");
        $this->db->insert("pg_mission", $data);
        return '<div class="alert alert-success alert-dismissible card-body">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Missions And Beliefs Information Updated Successfully ...
                </div>';
    }

    function getleadpastorsinfo()
    {
        $qq = $this->db->get("pg_leadpastor");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["content"] = $row->content;
           
        } else {
            $record["content"] = "";
        }
        return $record;
    }
    
    function updateleadpastorsinfo($data)
    {
        $this->db->query("truncate pg_leadpastor");
        $this->db->insert("pg_leadpastor", $data);
        return '<div class="alert alert-success alert-dismissible card-body">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Lead Pastors Information Updated Successfully ...
                </div>';
    }

    function getlifeatjhc()
    {
        $qq = $this->db->get("pg_lifeatjhc");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["content"] = $row->content;
           
        } else {
            $record["content"] = "";
        }
        return $record;
    }
    
    function updatelifeatjhc($data)
    {
        $this->db->query("truncate pg_lifeatjhc");
        $this->db->insert("pg_lifeatjhc", $data);
        return '<div class="alert alert-success alert-dismissible card-body">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Life At JHC Information Updated Successfully ...
                </div>';
    }
    function getvisit()
    {
        $qq = $this->db->get("pg_visit");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["content"] = $row->content;
           
        } else {
            $record["content"] = "";
        }
        return $record;
    }
    
    function updatevisit($data)
    {
        $this->db->query("truncate pg_visit");
        $this->db->insert("pg_visit", $data);
        return '<div class="alert alert-success alert-dismissible card-body">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Plan A Visit Information Updated Successfully ...
                </div>';
    }
    function gettakenextstep()
    {
        $qq = $this->db->get("pg_takeanextstep");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["content"] = $row->content;
           
        } else {
            $record["content"] = "";
        }
        return $record;
    }
    
    function updatetakenextstep($data)
    {
        $this->db->query("truncate pg_takeanextstep");
        $this->db->insert("pg_takeanextstep", $data);
        return '<div class="alert alert-success alert-dismissible card-body">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Take A Next Information Updated Successfully ...
                </div>';
    }

    function getrcf()
    {
        $qq = $this->db->get("pg_rcf");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["content"] = $row->content;
           
        } else {
            $record["content"] = "";
        }
        return $record;
    }
    
    function updatercf($data)
    {
        $this->db->query("truncate pg_rcf");
        $this->db->insert("pg_rcf", $data);
        return '<div class="alert alert-success alert-dismissible card-body">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                 RCF Information Updated Successfully ...
                </div>';
    }

    function getconnectgroups()
    {
        $qq = $this->db->get("pg_connectgroups");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["content"] = $row->content;
           
        } else {
            $record["content"] = "";
        }
        return $record;
    }
    
    function updateconnectgroups($data)
    {
        $this->db->query("truncate pg_connectgroups");
        $this->db->insert("pg_connectgroups", $data);
        return '<div class="alert alert-success alert-dismissible card-body">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                 Connect Groups Information Updated Successfully ...
                </div>';
    }

    function getcareeropp()
    {
        $qq = $this->db->get("pg_career");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["content"] = $row->content;
           
        } else {
            $record["content"] = "";
        }
        return $record;
    }
    
    function updatecareeropp($data)
    {
        $this->db->query("truncate pg_career");
        $this->db->insert("pg_career", $data);
        return '<div class="alert alert-success alert-dismissible card-body">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                 Career Opportunities Information Updated Successfully ...
                </div>';
    }

    
    function getoutreach()
    {
        $qq = $this->db->get("pg_outreach");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["content"] = $row->content;
           
        } else {
            $record["content"] = "";
        }
        return $record;
    }
    
    function updateoutreach($data)
    {
        $this->db->query("truncate pg_outreach");
        $this->db->insert("pg_outreach", $data);
        return '<div class="alert alert-success alert-dismissible card-body">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                 Outreach Ministries Information Updated Successfully ...
                </div>';
    }

     
    function getrccgvirginia()
    {
        $qq = $this->db->get("pg_rccgvirginia");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["content"] = $row->content;
           
        } else {
            $record["content"] = "";
        }
        return $record;
    }
    
    function updaterccgvirginia($data)
    {
        $this->db->query("truncate pg_rccgvirginia");
        $this->db->insert("pg_rccgvirginia", $data);
        return '<div class="alert alert-success alert-dismissible card-body">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                RCCG Virginia Information Updated Successfully ...
                </div>';
    }
    
    
    


}

?>
