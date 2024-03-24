<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class menupages extends CI_Controller {

    public function openchurchfaq() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $dropdown= $this->detailmodel->getidentifier();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $data["dropdown"]=$dropdown;

        $this->load->view('uploads/details/churchfaqs',$data);
    }
    public function viewchurchfaq() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->detailmodel->viewchurchfaq();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }
    public function deletethischurchfaq() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $feedback= $this->detailmodel->deletechurchfaq($this->uri->segment(5));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $rtnvals = $this->detailmodel->viewchurchfaq();

        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $data["feedback"] = $feedback;
        $this->load->view("manage", $data);
    }
    public function editthischurchfaq() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data = $this->detailmodel->getchurchfaq($this->uri->segment(5));
        $church= $this->churchinfo->getchurchinformation();
        $identifiers= $this->detailmodel->getidentifierforupdate();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["identifiers"]=$identifiers;

        $this->load->view("uploads/details/updates/churchfaqs", $data);
    }
    public function updatechurchfaq() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
    $this->form_validation->set_rules("question", "Question", "required|trim|min_length[3]");
    $this->form_validation->set_rules("answer", "Answer", "required|trim|min_length[3]");
    $this->form_validation->set_rules("numbering", "Order", "required|numeric|trim");
    $this->form_validation->set_rules("identifier", "Identifier", "required|trim");


    if ($this->form_validation->run() == FALSE) {
        $data = $this->detailmodel->getchurchfaq($this->input->post("id"));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("uploads/details/updates/churchfaqs",$data);
    } else {
        $val["question"] = $this->input->post("question");
        $val["answer"] = $this->input->post("answer");
        $val["numbering"] = $this->input->post("numbering");
        $val["id"] = $this->input->post("id");
        $val["identifier"] = $this->input->post("identifier");
        
        $feedback = $this->detailmodel->updatechurchfaq($val);
        $rtnvals = $this->detailmodel->viewchurchfaq();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $value["church"]=$church["name"];
        $value["favicon"]=$pic["photo"];
        $value["feedback"]=$feedback;
        $value["rtnhead"] = $rtnvals["head"];
        $value["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $value);
        }
    
    }
    


    public function uploadchurchfaq() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
    $this->form_validation->set_rules("question", "Question", "required|trim|min_length[3]");
    $this->form_validation->set_rules("answer", "Answer", "required|trim|min_length[3]");
    $this->form_validation->set_rules("identifier", "Identifier", "required|trim");
    $this->form_validation->set_rules("numbering", "Order", "required|numeric|trim");


    if ($this->form_validation->run() == FALSE) {
        $dropdown= $this->detailmodel->getidentifier();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["dropdown"]=$dropdown;

        $this->load->view("uploads/details/churchfaqs",$data);
    } else {
        $val["question"] = $this->input->post("question");
        $val["answer"] = $this->input->post("answer");
        $val["numbering"] = $this->input->post("numbering");
        $val["identifier"] = $this->input->post("identifier");
        
        $msg = $this->detailmodel->uploadchurchfaq($val);
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $value["church"]=$church["name"];
        $value["favicon"]=$pic["photo"];
        $value["msg"]=$msg;
        $this->load->view("feedbacks/sermon", $value);
        }
    
    }

    public function openrcffaq() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view('uploads/details/rcffaqs',$data);
    }
    public function viewrcffaq() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->detailmodel->viewrcffaq();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }
    public function editthisrcffaq() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data = $this->detailmodel->getrcffaq($this->uri->segment(5));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("uploads/details/updates/rcffaqs", $data);
    }
    public function deletethisrcffaq() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $feedback= $this->detailmodel->deletercffaq($this->uri->segment(5));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $rtnvals = $this->detailmodel->viewrcffaq();

        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $data["feedback"] = $feedback;
        $this->load->view("manage", $data);
    }
    public function updatercffaq() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
    $this->form_validation->set_rules("question", "Question", "required|trim|min_length[3]");
    $this->form_validation->set_rules("answer", "Answer", "required|trim|min_length[3]");
    $this->form_validation->set_rules("numbering", "Order", "required|numeric|trim");


    if ($this->form_validation->run() == FALSE) {
        $data = $this->detailmodel->getrcffaq($this->input->post("id"));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("uploads/details/updates/rcffaqs",$data);
    } else {
        $val["question"] = $this->input->post("question");
        $val["answer"] = $this->input->post("answer");
        $val["numbering"] = $this->input->post("numbering");
        $val["id"] = $this->input->post("id");
        
        $feedback = $this->detailmodel->updatercffaq($val);
        $rtnvals = $this->detailmodel->viewrcffaq();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $value["church"]=$church["name"];
        $value["favicon"]=$pic["photo"];
        $value["feedback"]=$feedback;
        $value["rtnhead"] = $rtnvals["head"];
        $value["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $value);
        }
    
    }

    public function uploadrcffaq() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
    $this->form_validation->set_rules("question", "Question", "required|trim|min_length[3]");
    $this->form_validation->set_rules("answer", "Answer", "required|trim|min_length[3]");
    $this->form_validation->set_rules("numbering", "Order", "required|numeric|trim");


    if ($this->form_validation->run() == FALSE) {
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("uploads/details/rcffaqs",$data);
    } else {
        $val["question"] = $this->input->post("question");
        $val["answer"] = $this->input->post("answer");
        $val["numbering"] = $this->input->post("numbering");
        
        $feedback = $this->detailmodel->uploadrcffaq($val);
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $value["church"]=$church["name"];
        $value["favicon"]=$pic["photo"];
        $value["feedback"]=$feedback;
        $this->load->view("uploads/details/rcffaqs", $value);
        }
    
    }

    public function opennextstep() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view('uploads/details/nextstep',$data);
    }
    public function viewnextstep() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->detailmodel->viewnextstep();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }
    public function deletethisnextstep() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $feedback= $this->detailmodel->deletenextstep($this->uri->segment(5));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $rtnvals = $this->detailmodel->viewnextstep();

        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $data["feedback"] = $feedback;
        $this->load->view("manage", $data);
    }
    public function editthisnextstep() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data = $this->detailmodel->getnextstep($this->uri->segment(5));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("uploads/details/updates/nextstep", $data);
    }

    public function updatenextstep() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
    $this->form_validation->set_rules("title", "Title", "required|trim|min_length[3]");
    $this->form_validation->set_rules("info", "Information", "required|trim|min_length[3]");
    $this->form_validation->set_rules("numbering", "Order Number", "required|numeric|trim");


    if ($this->form_validation->run() == FALSE) {
        $data = $this->detailmodel->getnextstep($this->input->post("id"));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("uploads/details/updates/nextstep",$data);
    } else {
        $val["title"] = $this->input->post("title");
        $val["info"] = $this->input->post("info");
        $val["numbering"] = $this->input->post("numbering");
        $val["id"] = $this->input->post("id");
        
        $feedback = $this->detailmodel->updatenextstep($val);
        $rtnvals = $this->detailmodel->viewnextstep();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $value["church"]=$church["name"];
        $value["favicon"]=$pic["photo"];
        $value["feedback"]=$feedback;
        $value["rtnhead"] = $rtnvals["head"];
        $value["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $value);
        }
    
    }

    public function uploadnextstep() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
    $this->form_validation->set_rules("title", "Title", "required|trim|min_length[3]");
    $this->form_validation->set_rules("content", "Information", "required|trim|min_length[3]");
    $this->form_validation->set_rules("numbering", "Order", "required|numeric|trim");


    if ($this->form_validation->run() == FALSE) {
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("uploads/details/nextstep",$data);
    } else {
        $val["title"] = $this->input->post("title");
        $val["info"] = $this->input->post("content");
        $val["numbering"] = $this->input->post("numbering");
        
        $feedback = $this->detailmodel->uploadnextstep($val);
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $value["church"]=$church["name"];
        $value["favicon"]=$pic["photo"];
        $value["feedback"]=$feedback;
        $this->load->view("uploads/details/nextstep", $value);
        }
    
    }

    public function opencareer() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view('uploads/details/career',$data);
    }
    public function viewcareer() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->detailmodel->viewcareer();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }
    public function deletethiscareer() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $feedback= $this->detailmodel->deletecareer($this->uri->segment(5));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $rtnvals = $this->detailmodel->viewcareer();

        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $rtnvals["head"];    
        $data["rtnbody"] = $rtnvals["body"];
        $data["feedback"] = $feedback;
        $this->load->view("manage", $data);
    }
    public function editthiscareer() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data = $this->detailmodel->getcareer($this->uri->segment(5));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("uploads/details/updates/career", $data);
    }


    public function updatecareer() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
    $this->form_validation->set_rules("title", "Title", "required|trim|min_length[3]");
    $this->form_validation->set_rules("location", "Location", "required|trim|min_length[3]");
    $this->form_validation->set_rules("description", "Career Description", "required|trim");


    if ($this->form_validation->run() == FALSE) {
        $data = $this->detailmodel->getcareer($this->input->post("id"));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("uploads/details/updates/career",$data);
    } else {
        $val["title"] = $this->input->post("title");
        $val["location"] = $this->input->post("location");
        $val["description"] = $this->input->post("description");
        $val["id"] = $this->input->post("id");
        
        $feedback = $this->detailmodel->updatecareer($val);
        $rtnvals = $this->detailmodel->viewcareer();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $value["church"]=$church["name"];
        $value["favicon"]=$pic["photo"];
        $value["feedback"]=$feedback;
        $value["rtnhead"] = $rtnvals["head"];
        $value["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $value);
        }
    
    }

    public function uploadcareer() {
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
    $this->form_validation->set_rules("title", "Title", "required|trim");
    $this->form_validation->set_rules("location", "Location", "required|trim");
    $this->form_validation->set_rules("description", "Description", "required|trim");


    if ($this->form_validation->run() == FALSE) {
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("uploads/details/career",$data);
    } else {
        $val["title"] = $this->input->post("title");
        $val["location"] = $this->input->post("location");
        $val["description"] = $this->input->post("description");
        
        $feedback = $this->detailmodel->uploadcareer($val);
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $value["church"]=$church["name"];
        $value["favicon"]=$pic["photo"];
        $value["feedback"]=$feedback;
        $this->load->view("uploads/details/career", $value);
        }
    
    }
    public function openprayerresources() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view('uploads/details/prayerresources',$data);
    }

    public function uploadprayresources() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("title", "Title", "required|trim|min_length[3]");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'mp3|pdf|txt|xlsx|doc';
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

            $this->load->view('uploads/details/prayerresources',$data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $data["error"] =$this->upload->display_errors();
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];

                $this->load->view('uploads/details/prayerresources', $data);
            } else {
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $rec['document'] = $data["file_name"];
                $rec["title"] = $this->input->post("title");
                $feedback = $this->detailmodel->uploadprayerresources($rec);
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $data["feedback"]=$feedback;

                $this->load->view('uploads/details/prayerresources', $data);
            }
        }
    }

    public function viewprayerresources() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->detailmodel->viewprayerresources();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }

    public function deletethisprayerresources() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $feedback= $this->detailmodel->deleteprayerresources($this->uri->segment(5));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $rtnvals = $this->detailmodel->viewprayerresources();

        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $data["feedback"] = $feedback;
        $this->load->view("manage", $data);
    }
    public function editthisprayerresources() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");

        $data = $this->detailmodel->getprayerresources($this->uri->segment(5));
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $this->load->view("uploads/details/updates/prayerresources", $data);
    }

    public function updateprayerresources() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("title", "Title", "required|trim|min_length[3]");

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'mp3|pdf|txt|xlsx|doc';
        $config['max_size'] = 10000000000;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->form_validation->run() == FALSE) {
            $data = $this->detailmodel->getprayerresources($this->input->post('id'));
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

            $this->load->view('uploads/details/updates/prayerresources',$data);
        } else {
            if (!$this->upload->do_upload('userfile')) {
                $data = $this->detailmodel->getprayerresources($this->input->post("id"));
                $data["error"] =$this->upload->display_errors();
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];

                $this->load->view('uploads/details/updates/prayerresources', $data);
            } else {
                $data = $this->upload->data();
                $upload = array('upload_data' => $data);
                $rec['document'] = $data["file_name"];
                $rec["title"] = $this->input->post("title");
                $rec["id"] = $this->input->post("id");
                $feedback = $this->detailmodel->updateprayerresources($rec);
                $rtnvals = $this->detailmodel->viewprayerresources();
                $church= $this->churchinfo->getchurchinformation();
                $pic=$this->footerbackg->getfooterbg();
                $data["church"]=$church["name"];
                $data["favicon"]=$pic["photo"];
                $data["feedback"]=$feedback;
                $data["rtnhead"] = $rtnvals["head"];
                $data["rtnbody"] = $rtnvals["body"];
                $this->load->view('manage', $data);
            }
        }
    }

    

}