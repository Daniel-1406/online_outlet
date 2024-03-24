<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
       $this->load->view('login');
    }
    
    public function login() {
        $val = $this->admin->adminlogin();
        if ($val == "wrong") {
            $data["val"] = "<span style='color:red'>Wrong Username or password!</span>";
            $this->load->view("login", $data);
        } else {
            $this->opendashboard();
        }
    }
    public function opendashboard(){
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
        $data=array();
        
        $menu=$this->admin->countmenu();
        $records=$this->admin->countrecords();
        $audio=$this->admin->countaudio();
        $video=$this->admin->countvideo();
        $carousel=$this->admin->countcarousel();
        $minicarousel=$this->admin->countminicarousel();
        $memories=$this->admin->countmemories();
        $stories=$this->admin->countstories();
        $pages=$this->admin->countpages();
        $program=$this->admin->countprograms();
        $exhortations=$this->admin->countexhortations();
        $events=$this->admin->countevents();
        $faqs=$this->admin->countfaqs();
        $prayers=$this->admin->countprayers();
        $careers=$this->admin->countcareers();
        $requests=$this->admin->countrequests();
        $contacts=$this->admin->countcontact();
        //$this->load->helper('cookie');
        //$visitor=$this->input->cookie(urldecode(), FALSE);
        $ipaddress=$_SERVER['SERVER_PORT'];
      
        $info=$this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        

        $data["menu_count"]=$menu;
        $data["records_count"]=$records;
        $data["audio_count"]=$audio;
        $data["video_count"]=$video;
        $data["carousel_count"]=$carousel;
        $data["minicarousel_count"]=$minicarousel;
        $data["memories_count"]=$memories;
        $data["stories_count"]=$stories;
        $data["pages_count"]=$pages;
        $data["program_count"]=$program;
        $data["exhortation_count"]=$exhortations;
        $data["event_count"]=$events;
        $data["faq_count"]=$faqs;
        $data["prayer_count"]=$prayers;
        $data["career_count"]=$careers;
        $data["request_count"]=$requests;
        $data["contact_count"]=$contacts;
        $data["ipaddress_count"]=$ipaddress;
        
        $data["church"]=$info["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("dashboard",$data);
}
    public function openinfo() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $data= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$data["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("updates/churchinfo", $data);
    }
    public function openlatestevent() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $data= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$data["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("updates/latestevent", $data);
    }
    
    public function updatechurchinfo() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $this->form_validation->set_rules("name", "Name", "required|trim|min_length[3]|max_length[100]");
        $this->form_validation->set_rules("heading", "Heading", "required|trim|min_length[3]|max_length[100]");
        $this->form_validation->set_rules("information", "Information", "required|trim|min_length[1]");
        $this->form_validation->set_rules("address", " Address", "required|trim|min_length[1]");
        $this->form_validation->set_rules("telephone", "Telephone", "required|trim|min_length[1]");
        $this->form_validation->set_rules("email", "Email ", "required|trim|min_length[1]");
        $this->form_validation->set_rules("googlemap", "Google Map Location", "required|trim");
        $this->form_validation->set_rules("maj_color", " Major Color", "trim|min_length[1]");
        $this->form_validation->set_rules("min_color", "Minor Color", "trim|min_length[1]");
        $this->form_validation->set_rules("twitter", "Twitter Link", "required|trim|min_length[1]");
        $this->form_validation->set_rules("instagram", "Instagram Link" , "required|trim|min_length[1]");
        $this->form_validation->set_rules("youtube", "Youtube Link", "required|trim|min_length[1]");
        $this->form_validation->set_rules("facebook", "Facebook Link", "required|trim|min_length[1]");
        if ($this->form_validation->run() == FALSE) {
            $data= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$data["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view("updates/churchinfo",$data);
        } else {
            $data["msg"]= $this->churchinfo->updatechurchinfo();
            $church= $this->churchinfo->getchurchinformation();
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
            $this->load->view("feedbacks/sermon", $data);
        }
    }

    public function opendonateupdate() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $db= $this->donatemodel->getdonateitems();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $data["photo"]=$db["photo"];
        $data["button_info"]=$db["button_info"];
        $data["information"]=$db["information"];
        $data["heading"]=$db["heading"];
    
        $this->load->view("updates/donateinfo", $data);
    }
    public function openrecordupdate() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $db= $this->donatemodel->getdonateitems();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $data["photo"]=$db["photo"];
        $data["button_info"]=$db["button_info"];
        $data["information"]=$db["information"];
        $data["heading"]=$db["heading"];
    
        $this->load->view("updates/headingrecord", $data);
    }
    public function openvideoupdate() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $db= $this->donatemodel->getdonateitems();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $data["photo"]=$db["photo"];
        $data["button_info"]=$db["button_info"];
        $data["information"]=$db["information"];
        $data["heading"]=$db["heading"];
    
        $this->load->view("updates/headingvideo", $data);
    }
    public function openarticleupdate() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $db= $this->donatemodel->getdonateitems();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];

        $data["photo"]=$db["photo"];
        $data["button_info"]=$db["button_info"];
        $data["information"]=$db["information"];
        $data["heading"]=$db["heading"];
    
        $this->load->view("updates/headingarticle", $data);
    }
    public function viewmessages() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->admin->getmessages();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }
    public function deletethismessage() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["msg"] = $this->admin->deletemessage($this->uri->segment(3));
        $this->load->view("feedbacks/sermon", $data);
    }
    public function viewrequests() {
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
        $rtnvals = $this->admin->getrequests();
        $church= $this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        $data["church"]=$church["name"];
        $data["favicon"]=$pic["photo"];
        $data["rtnhead"] = $rtnvals["head"];
        $data["rtnbody"] = $rtnvals["body"];
        $this->load->view("manage", $data);
    }
    public function getipaddress(){
        $data["ipaddress"]=$this->input->ip_address();
        return $data;

    }
    public function filefunc(){
        if ($this->session->userdata("admin_pass") == "")
        redirect("welcome/");
        $data=array();
        
        $menu=$this->admin->countmenu();
        $records=$this->admin->countrecords();
        $audio=$this->admin->countaudio();
        $video=$this->admin->countvideo();
        $carousel=$this->admin->countcarousel();
        $minicarousel=$this->admin->countminicarousel();
        $memories=$this->admin->countmemories();
        $stories=$this->admin->countstories();
        $pages=$this->admin->countpages();
        $program=$this->admin->countprograms();
        $exhortations=$this->admin->countexhortations();
        $events=$this->admin->countevents();
        $faqs=$this->admin->countfaqs();
        $prayers=$this->admin->countprayers();
        $careers=$this->admin->countcareers();
        $requests=$this->admin->countrequests();
        $contacts=$this->admin->countcontact();
        //$this->load->helper('cookie');
        //$visitor=$this->input->cookie(urldecode(), FALSE);
        $ipaddress=$_SERVER['SERVER_PORT'];
      
        $info=$this->churchinfo->getchurchinformation();
        $pic=$this->footerbackg->getfooterbg();
        

        $data["menu_count"]=$menu;
        $data["records_count"]=$records;
        $data["audio_count"]=$audio;
        $data["video_count"]=$video;
        $data["carousel_count"]=$carousel;
        $data["minicarousel_count"]=$minicarousel;
        $data["memories_count"]=$memories;
        $data["stories_count"]=$stories;
        $data["pages_count"]=$pages;
        $data["program_count"]=$program;
        $data["exhortation_count"]=$exhortations;
        $data["event_count"]=$events;
        $data["faq_count"]=$faqs;
        $data["prayer_count"]=$prayers;
        $data["career_count"]=$careers;
        $data["request_count"]=$requests;
        $data["contact_count"]=$contacts;
        $data["ipaddress_count"]=$ipaddress;
        
        $data["church"]=$info["name"];
        $data["favicon"]=$pic["photo"];
        $this->load->view("dashboard",$data);

    }
    public function replythismessage(){
        if ($this->session->userdata("admin_pass") == "")
            redirect("welcome/");
            $church= $this->churchinfo->getchurchinformation();
            $data["messagedata"]=$this->admin->getmessagedata($this->uri->segment("3"));
            $pic=$this->footerbackg->getfooterbg();
            $data["church"]=$church["name"];
            $data["favicon"]=$pic["photo"];
        $this->load->view("uploads/replymessage",$data);
    }
    

    
    public function logout() {
        $this->session->unset_userdata("admin_pass");
        redirect("welcome");
    }

}

