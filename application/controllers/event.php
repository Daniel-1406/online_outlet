<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {


    public function do_upload() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("name", "Event Name", "required|trim|min_length[3]");
        $this->form_validation->set_rules("description", "Event Description", "required|trim|min_length[3]");
        $this->form_validation->set_rules("date", "Event Date", "required|trim|min_length[3]");


        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            //it hasn't been ran or there are validation errorrs
            $this->load->view('uploads/event');
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('uploads/event', $error);
            } else {


                $data = $this->upload->data();
                $upload = array('upload_data' => $data);

                $rec["msg"] = $this->eventmodel->insertevent($data["file_name"]);

                $this->load->view('feedback/event', $rec);
            }
        }
    }
    
    
    public function viewevent() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");
        $rtnvals = $this->eventmodel->viewevent();
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }
    
        public function deletethisevent() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $res["msg"]=$this->eventmodel->deleteevent($this->uri->segment(3));
        $this->load->view("feedbacks/event", $res);
    }

    public function editthisevent() {
        if ($this->session->userdata("admin") == "")
            redirect("welcome/");

        $rtnvals = $this->eventmodel->editevent($this->uri->segment(3));
        $this->load->view("update/event", $rtnvals);
    }

}
?>
