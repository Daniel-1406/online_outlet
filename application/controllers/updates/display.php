<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class display extends CI_Controller {

    public function openmission() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getmission();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view('updates/mission',$data);
    }
    public function updatemission(){
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
        $this->form_validation->set_rules("content", "Content", "required|trim");
        if($this->form_validation->run()==FALSE){
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getmission();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/mission',$data);
        }else{
            $result["content"] = $this->input->post("content");
            $feedback = $this->displaymodel->updatemission($result);
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getmission();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $data["feedback"]=$feedback;
            $this->load->view('updates/mission', $data);


        }
     
    }

    public function openleadpastorinfo() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getleadpastorsinfo();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view('updates/leadpastorsinfo',$data);
    }

    public function updateleadpastorsinfo(){
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
        $this->form_validation->set_rules("content", "Content", "required|trim");
        if($this->form_validation->run()==FALSE){
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getleadpastorsinfo();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/leadpastorsinfo',$data);
        }else{
            $result["content"] = $this->input->post("content");
            $feedback= $this->displaymodel->updateleadpastorsinfo($result);
            $church= $this->churchinfo->getchurchinformation();
            $data=$this->displaymodel->getleadpastorsinfo();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $data["feedback"]=$feedback;
            $this->load->view('updates/leadpastorsinfo', $data);

        }
     
    }


    public function openlifeatjhc() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getlifeatjhc();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view('updates/lifeatjhc',$data);
    }

    public function updatelifeatjhc(){
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
        $this->form_validation->set_rules("content", "Content", "required|trim");
        if($this->form_validation->run()==FALSE){
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getlifeatjhc();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/lifeatjhc',$data);
        }else{
            $result["content"] = $this->input->post("content");
            $feedback= $this->displaymodel->updatelifeatjhc($result);
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getlifeatjhc();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $data["feedback"]=$feedback;
            $this->load->view('updates/lifeatjhc', $data);


        }
     
    }

    public function openplanavisit() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getvisit();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view('updates/planyourvisit',$data);
    }

    public function updateplanavisit(){
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
        $this->form_validation->set_rules("content", "Content", "required|trim");
        if($this->form_validation->run()==FALSE){
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getvisit();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/planyourvisit',$data);
        }else{
            $result["content"] = $this->input->post("content");
            $feedback = $this->displaymodel->updatevisit($result);
            $church= $this->churchinfo->getchurchinformation();
            $data=$this->displaymodel->getvisit();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $data["feedback"]=$feedback;
            $this->load->view('updates/planyourvisit', $data);


        }
     
    }
    
    public function opentakenextstep() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->gettakenextstep();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view('updates/takeanextstep',$data);
    }

    public function updatetakenextstep(){
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
        $this->form_validation->set_rules("content", "Content", "required|trim");
        if($this->form_validation->run()==FALSE){
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->gettakenextstep();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/takeanextstep',$data);
        }else{
            $result["content"] = $this->input->post("content");
            $feedback = $this->displaymodel->updatetakenextstep($result);
            $church= $this->churchinfo->getchurchinformation();
            $data=$this->displaymodel->gettakenextstep();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $data["feedback"]=$feedback;
            $this->load->view('updates/takeanextstep', $data);


        }
     
    }
       
    public function openrcf() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getrcf   ();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view('updates/rcf',$data);
    }
    public function updatercf(){
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
        $this->form_validation->set_rules("content", "Content", "required|trim");
        if($this->form_validation->run()==FALSE){
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getrcf();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/rcf',$data);
        }else{
            $result["content"] = $this->input->post("content");
            $feedback = $this->displaymodel->updatercf($result);
            $church= $this->churchinfo->getchurchinformation();
            $data=$this->displaymodel->getrcf();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $data["feedback"]=$feedback;
            $this->load->view('updates/rcf', $data);


        }
     
    }
    public function openconnectgroups() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getconnectgroups();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view('updates/connectgroups',$data);
    }
    public function updateconnectgroups(){
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
        $this->form_validation->set_rules("content", "Content", "required|trim");
        if($this->form_validation->run()==FALSE){
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getconnectgroups();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/connectgroups',$data);
        }else{
            $result["content"] = $this->input->post("content");
            $feedback = $this->displaymodel->updateconnectgroups($result);
            $church= $this->churchinfo->getchurchinformation();
            $data=$this->displaymodel->getconnectgroups();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $data["feedback"]=$feedback;
            $this->load->view('updates/connectgroups', $data);


        }
     
    }

    public function opencareeropp() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getcareeropp();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view('updates/aboutcareeropp',$data);
    }
    public function updatecareeropp(){
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
        $this->form_validation->set_rules("content", "Content", "required|trim");
        if($this->form_validation->run()==FALSE){
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getcareeropp();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/aboutcareeropp',$data);
        }else{
            $result["content"] = $this->input->post("content");
            $feedback = $this->displaymodel->updatecareeropp($result);
            $church= $this->churchinfo->getchurchinformation();
            $data=$this->displaymodel->getcareeropp();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $data["feedback"]=$feedback;
            $this->load->view('updates/aboutcareeropp', $data);


        }
     
    }

    public function openoutreach() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getoutreach();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view('updates/outreach',$data);
    }
    public function updateoutreach(){
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
        $this->form_validation->set_rules("content", "Content", "required|trim");
        if($this->form_validation->run()==FALSE){
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getoutreach();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/outreach',$data);
        }else{
            $result["content"] = $this->input->post("content");
            $feedback = $this->displaymodel->updateoutreach($result);
            $church= $this->churchinfo->getchurchinformation();
            $data=$this->displaymodel->getoutreach();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $data["feedback"]=$feedback;
            $this->load->view('updates/outreach', $data);


        }
     
    }
    public function openrccgvirginia() {

        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getrccgvirginia();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];

        $this->load->view('updates/rccgvirginia',$data);
    }
    public function updaterccgvirginia(){
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
        $this->form_validation->set_rules("content", "Content", "required|trim");
        if($this->form_validation->run()==FALSE){
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data=$this->displaymodel->getrccgvirginia();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view('updates/rccgvirginia',$data);
        }else{
            $result["content"] = $this->input->post("content");
            $feedback = $this->displaymodel->updaterccgvirginia($result);
            $church= $this->churchinfo->getchurchinformation();
            $data=$this->displaymodel->getrccgvirginia();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $data["feedback"]=$feedback;
            $this->load->view('updates/rccgvirginia', $data);


        }
     
    }


   





   

    

}

?>
