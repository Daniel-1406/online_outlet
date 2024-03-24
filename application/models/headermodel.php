<?php

class Headermodel extends CI_Model {


    function getevent()
    {
        $qq = $this->db->get("hd_event");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["title"] = $row->title;
            $record["subtitle"] = $row->subtitle;
            $record["photo"] = $row->photo;
           
        } else {
            $record["title"] = "";
            $record["subtitle"] = "";
            $record["photo"] = "";           
        }
        return $record;
    }

    function getrecord()
    {
        $qq = $this->db->get("hd_record");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["title"] = $row->title;
            $record["subtitle"] = $row->subtitle;
            $record["photo"] = $row->photo;
           
        } else {
            $record["title"] = "";
            $record["subtitle"] = "";
            $record["photo"] = "";           
        }
        return $record;
    }

    function getmemories()
    {
        $qq = $this->db->get("hd_memories");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["title"] = $row->title;
            $record["subtitle"] = $row->subtitle;
            $record["photo"] = $row->photo;
           
        } else {
            $record["title"] = "";
            $record["subtitle"] = "";
            $record["photo"] = "";           
        }
        return $record;
    }
    function getcontact()
    {
        $qq = $this->db->get("hd_contact");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["title"] = $row->title;
            $record["subtitle"] = $row->subtitle;
            $record["photo"] = $row->photo;
           
        } else {
            $record["title"] = "";
            $record["subtitle"] = "";
            $record["photo"] = "";           
        }
        return $record;
    }
    function getnewhere()
    {
        $qq = $this->db->get("hd_leadteam");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["title"] = $row->title;
            $record["subtitle"] = $row->subtitle;
            $record["photo"] = $row->photo;
           
        } else {
            $record["title"] = "";
            $record["subtitle"] = "";
            $record["photo"] = "";           
        }
        return $record;
    }
    function getvideos()
    {
        $qq = $this->db->get("hd_videos");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["title"] = $row->title;
            $record["subtitle"] = $row->subtitle;
            $record["photo"] = $row->photo;
           
        } else {
            $record["title"] = "";
            $record["subtitle"] = "";
            $record["photo"] = "";           
        }
        return $record;
    }

function getresources()
{
    $qq = $this->db->get("hd_resources");
    $record = array();
    if ($qq->num_rows() > 0) {
        $row = $qq->row();
        $record["title"] = $row->title;
        $record["subtitle"] = $row->subtitle;
        $record["photo"] = $row->photo;
       
    } else {
        $record["title"] = "";
        $record["subtitle"] = "";
        $record["photo"] = "";           
    }
    return $record;
}

    function getmemcenter()
    {
        $qq = $this->db->get("hd_memcenter");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["title"] = $row->title;
            $record["subtitle"] = $row->subtitle;
            $record["photo"] = $row->photo;
           
        } else {
            $record["title"] = "";
            $record["subtitle"] = "";
            $record["photo"] = "";           
        }
        return $record;
    }

    function getabout()
    {
        $qq = $this->db->get("hd_requestform");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["title"] = $row->title;
            $record["subtitle"] = $row->subtitle;
            $record["photo"] = $row->photo;
           
        } else {
            $record["title"] = "";
            $record["subtitle"] = "";
            $record["photo"] = "";           
        }
        return $record;
    }
    function getlive()
    {
        $qq = $this->db->get("livestream");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["title"] = $row->title;
            $record["link"] = $row->link;
            $record["photo"] = $row->photo;
            $record["date"] = $row->date;
            $record["upload_date"] = $row->upload_date;
           
        } else {
            $record["title"] = "";
            $record["link"] = "";
            $record["photo"] = "";
            $record["date"] = "";
            $record["upload_date"] = "";          
        }
        return $record;
    }

    function getexhortation()
    {
        $qq = $this->db->get("hd_article");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["title"] = $row->title;
            $record["subtitle"] = $row->subtitle;
            $record["photo"] = $row->photo;
           
        } else {
            $record["title"] = "";
            $record["subtitle"] = "";
            $record["photo"] = "";           
        }
        return $record;
    }


    function updateevent($data)
    {
        $this->db->query("truncate hd_event");
        $this->db->insert("hd_event", $data);
        return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Event Banner Updated Successfully ...
                </div>';
    }
    function updatenewhere($data)
    {
        $this->db->query("truncate hd_leadteam");
        $this->db->insert("hd_leadteam", $data);
        return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Leadership Team Banner Updated Successfully ...
                </div>';
    }

    function updatevideos($data)
    {
        $this->db->query("truncate hd_videos");
        $this->db->insert("hd_videos", $data);
        return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Videos Banner Updated Successfully ...
                </div>';
    }

    function updaterecord($data)
    {
        $this->db->query("truncate hd_record");
        $this->db->insert("hd_record", $data);
        return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Records Banner Updated Successfully ...
                </div>';
    }


    function updatememories($data)
    {
        $this->db->query("truncate hd_memories");
        $this->db->insert("hd_memories", $data);
        return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Memories Banner Updated Successfully ...
                </div>';
    }

    function updatememcenter($data)
    {
        $this->db->query("truncate hd_memcenter");
        $this->db->insert("hd_memcenter", $data);
        return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Member\'s Center Banner Updated Successfully ...
                </div>';
    }
    function updatelive($data)
    {
        $this->db->query("truncate livestream");
        $this->db->insert("livestream", $data);
        return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Livestream Information Updated Successfully ...
                </div>';
    }
    function updatecontact($data)
    {
        $this->db->query("truncate hd_contact");
        $this->db->insert("hd_contact", $data);
        return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Contact Banner Updated Successfully ...
                </div>';
    }

    function updateabout($data)
    {
        $this->db->query("truncate hd_requestform");
        $this->db->insert("hd_requestform", $data);
        return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Request Form Banner Updated Successfully ...
                </div>';
    }
    function updateexhortation($data)
    {
        $this->db->query("truncate hd_article");
        $this->db->insert("hd_article", $data);
        return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Exhortations Banner Updated Successfully ...
                </div>';
    }
    function updateresources($data)
    {
        $this->db->query("truncate hd_resources");
        $this->db->insert("hd_resources", $data);
        return '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  Resources Banner Updated Successfully ...
                </div>';
    }



    function loadexhortation()
    {
        $qq = $this->db->get("hd_article");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["title"] = $row->title;
            $record["subtitle"] = $row->subtitle;
            $record["photo"] = $row->photo;
           
        } else {
            $record["title"] = "";
            $record["subtitle"] = "";
            $record["photo"] = "";           
        }
        return $record;
    }
    function loadcontact()
    {
        $qq = $this->db->get("hd_contact");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["title"] = $row->title;
            $record["subtitle"] = $row->subtitle;
            $record["photo"] = $row->photo;
           
        } else {
            $record["title"] = "";
            $record["subtitle"] = "";
            $record["photo"] = "";           
        }
        return $record;
    }
    function loadaboutus()
    {
        $qq = $this->db->get("hd_about");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["title"] = $row->title;
            $record["subtitle"] = $row->subtitle;
            $record["photo"] = $row->photo;
           
        } else {
            $record["title"] = "";
            $record["subtitle"] = "";
            $record["photo"] = "";           
        }
        return $record;
    }

    function loadvideos()
    {
        $qq = $this->db->get("hd_videos");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["title"] = $row->title;
            $record["subtitle"] = $row->subtitle;
            $record["photo"] = $row->photo;
           
        } else {
            $record["title"] = "";
            $record["subtitle"] = "";
            $record["photo"] = "";           
        }
        return $record;
    }
    function loadevent()
    {
        $qq = $this->db->get("hd_event");
        $record = array();
        if ($qq->num_rows() > 0) {
            $row = $qq->row();
            $record["title"] = $row->title;
            $record["subtitle"] = $row->subtitle;
            $record["photo"] = $row->photo;
           
        } else {
            $record["title"] = "";
            $record["subtitle"] = "";
            $record["photo"] = "";           
        }
        return $record;
    }
    

    
    

    
    
    


}

?>
