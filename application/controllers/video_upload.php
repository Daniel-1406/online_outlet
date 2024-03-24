<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class video_upload extends CI_Controller {

    public function do_upload() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $this->form_validation->set_rules("topic", "Video Heading", "required|trim|min_length[3]");
            $this->form_validation->set_rules("speaker", "Speaker", "required|trim|min_length[3]");
            $this->form_validation->set_rules("summary", "Summary", "required|trim|min_length[3]");
            $this->form_validation->set_rules("date", "Date", "required|trim|min_length[3]");
            $this->form_validation->set_rules("link", "Link", "required|trim");
    
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 10000000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('uploads/videoupload',$data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $data = array('error' => $this->upload->display_errors());
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];

                $this->load->view('uploads/videoupload', $data);
            } else {
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $data["msg"] = $this->videomodel->uploadvideo($data["file_name"]);
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $this->load->view('feedbacks/sermon', $data);
            }
        }
    }

    public function uploadvideo() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("login/");
    //then validation 
    $this->form_validation->set_rules("title", "Video Caption", "required|trim");
    $this->form_validation->set_rules("link", "Vdeo Link", "required|trim|min_length[1]");
    

    if ($this->form_validation->run() == FALSE) {
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("uploads/video",$data);
    } else {
        $val["title"] = $this->input->post("title");
        $val["link"] = $this->input->post("link");
            $data["msg"] = $this->videomodel->uploadvideo($val);
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view("feedbacks/sermon", $data);
        }
    
    }
    public function openvideoupload() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
        $this->load->view('uploads/videoupload',$data);
    }

    public function viewvideo() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->videomodel->viewvideos();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }

    public function deletethisvideo() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data["msg"] = $this->videomodel->deletevideo($this->uri->segment(3));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("feedbacks/sermon", $data);
    }
    public function editthisvideo() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data = $this->videomodel->editvideo($this->uri->segment(3));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("updates/video", $data);
    }

    

}

?>
