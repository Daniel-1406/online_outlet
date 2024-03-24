<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class event   extends CI_Controller {

    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("title", "Event Title", "required|trim|min_length[3]");
        $this->form_validation->set_rules("speaker", "Speaker", "required|trim|min_length[3]");
        $this->form_validation->set_rules("summary", "Summary", "required|trim|min_length[3]");
        $this->form_validation->set_rules("time", "Time", "required|trim");
        $this->form_validation->set_rules("role", "Role", "required|trim|min_length[3]");
        $this->form_validation->set_rules("date", "Event Date", "required|trim|min_length[3]");
        $this->form_validation->set_rules("location", "Event Location", "required|trim|min_length[3]");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 10000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

            $this->load->view('uploads/event',$data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $data= array('error' => $this->upload->display_errors());
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];

                $this->load->view('uploads/event', $data);
            } else {
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $data["msg"] = $this->eventmodel->uploadevent($data["file_name"]);
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];

                $this->load->view('feedbacks/sermon', $data);
            }
        }
    }

    public function openevent() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
        $this->load->view('uploads/event',$data);
    }

    public function viewevents() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $data = $this->eventmodel->viewevents();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $data["head"];
        $data["rtnbody"] = $data["body"];
        $this->load->view("manage", $data);
    }

    public function deletethisevent() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["msg"] = $this->eventmodel->deleteevent($this->uri->segment(3));
        $this->load->view("feedbacks/sermon", $data);
    }

    public function editthisevent() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data = $this->eventmodel->editevent($this->uri->segment(3));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("updates/event", $data);
    }

}

?>
