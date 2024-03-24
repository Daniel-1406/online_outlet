<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class service extends CI_Controller {

    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("title", "Sercice Title", "required|trim|min_length[3]");
        $this->form_validation->set_rules("summary", "Service Summary", "required|trim|min_length[3]");
        $this->form_validation->set_rules("day", "Servie Day", "required|trim|min_length[3]");
        $this->form_validation->set_rules("info", "Service Infirmation", "required|trim|min_length[3]");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 10000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('uploads/service',$data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $data = array('error' => $this->upload->display_errors());
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];

                $this->load->view('uploads/service', $data);
            } else {
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $data["msg"] = $this->servicemodel->uploadservice($data["file_name"]);
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $this->load->view('feedbacks/sermon', $data);
            }
        }
    }

    public function openservice() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view('uploads/service',$data);
    }

    public function viewservices() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->servicemodel->viewminicarousel();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }

    public function deletethisservice() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data["msg"] = $this->servicemodel->deleteservice($this->uri->segment(3));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("feedbacks/sermon", $data);
    }
    public function editthisservice() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data = $this->servicemodel->editservice($this->uri->segment(3));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("updates/service", $data);
    }

}

?>
