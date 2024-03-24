<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  

    public function index() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["carousel"]=$this->homemodel->getcarousel();
        $data["records"]=$this->homemodel->getrecord();
        $data["testimonies"]=$this->homemodel->gettestimonies();
        $data["videos"]=$this->homemodel->getvideos();
        $data["memories"]=$this->homemodel->getmemories();
        $data["randomphotos"]=$this->homemodel->getrandomphotos();
        $data["mini_carousel"]=$this->homemodel->getminicarousel();
        $data["donate"]=$this->homemodel->getdonateitems();
        $data["exhortations"]=$this->homemodel->getexhortations();
        $data["events"]=$this->homemodel->getevents();
        $data["programs"]=$this->homemodel->getprograms();
        $data["generalfaq"]=$this->homemodel->gethomefaqs();
        $data["parishes"]=$this->homemodel->getparishes();
       $this->load->view('display/index',$data);
    }

    public function aboutus() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["parishes"]=$this->homemodel->getparishes();
       $this->load->view('display/pages/aboutus',$data);
    }
    public function livestreampage() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["banner"]=$this->headermodel->getevent();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["events"]=$this->homemodel->getallevents();
        $data["live"]=$this->headermodel->getlive();
        $data["parishes"]=$this->homemodel->getparishes();
       $this->load->view('display/livestream',$data);
    }


    public function contact() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["header"]=$this->headermodel->loadcontact();
        $data["parishes"]=$this->homemodel->getparishes();
       $this->load->view('display/contact',$data);
    }
    public function aboutus1() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["header"]=$this->headermodel->loadaboutus();
        $data["parishes"]=$this->homemodel->getparishes();

       $this->load->view('display/aboutus',$data);
    }


    public function displaytemp() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["parishes"]=$this->homemodel->getparishes();
       $this->load->view('display/displaytemp',$data);
    }
    public function requestforms() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["parishes"]=$this->homemodel->getparishes();
        $data["banner"]=$this->headermodel->getabout();
        $data["requestforms"]=$this->homemodel->getrequestforms();
       $this->load->view('display/requestforms',$data);
    }
   
    public function page() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["randompage"]=$this->homemodel->getrandompage();
        $data["page"]=$this->homemodel->getpage($this->uri->segment(3));
        $data["faqs"]=$this->homemodel->getspecificfaqs($this->uri->segment(3));
        if($this->uri->segment(3)=='nextstep'){
        $data["requestforms"]=$this->homemodel->getrequestforms();
        }
        $data["parishes"]=$this->homemodel->getparishes();
       $this->load->view('display/displaytemp',$data);
    }
    public function careerpage() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["randompage"]=$this->homemodel->getrandompage();
        $data["banner"]=$this->headermodel->getresources();
        $data["career"]=$this->homemodel->getcareer($this->uri->segment(3));
        $data["parishes"]=$this->homemodel->getparishes();
       $this->load->view('display/career',$data);
    }
    public function prayerresources() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["randompage"]=$this->homemodel->getrandompage();
        $data["banner"]=$this->headermodel->getresources();
        $data["page"]=$this->homemodel->getpage($this->uri->segment(3));
        $data["faqs"]=$this->homemodel->getspecificfaqs($this->uri->segment(3));
        $data["parishes"]=$this->homemodel->getparishes();
        $data["prayerresources"]=$this->homemodel->getprayerresources();
       $this->load->view('display/resources',$data);
    }
    public function resources() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["prayerresources"]=$this->homemodel->getprayerresources();
        $data["randompage"]=$this->homemodel->getrandompage();
        $data["careers"]=$this->homemodel->getcareers();
        $data["banner"]=$this->headermodel->getresources();
        $data["audio"]=$this->homemodel->getaudio();
        $data["page"]=$this->homemodel->getpage($this->uri->segment(3));
        $data["faqs"]=$this->homemodel->getspecificfaqs($this->uri->segment(3));
        $data["parishes"]=$this->homemodel->getparishes();
       $this->load->view('display/resources',$data);
    }
    public function leadershipteam() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["randompage"]=$this->homemodel->getrandompage();
        $data["banner"]=$this->headermodel->getnewhere();
        $data["leaders"]=$this->homemodel->getleaders();
        $data["page"]=$this->homemodel->getpage($this->uri->segment(3));
        $data["faqs"]=$this->homemodel->getspecificfaqs($this->uri->segment(3));
        $data["parishes"]=$this->homemodel->getparishes();
       $this->load->view('display/leadershipteam',$data);
    }



    public function openexhortation() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["exhortation"]=$this->loadpagemodel->getexhortation($this->uri->segment(3));
        $data["header"]=$this->headermodel->loadexhortation();
        $data["recentexhortation"]=$this->loadpagemodel->getrecentexhortations();
        $data["randompages"]=$this->loadpagemodel->getrandompage();
        $data["parishes"]=$this->homemodel->getparishes();
       $this->load->view('display/wholeexhortation',$data);
    }
    public function openvideos() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["videos"]=$this->homemodel->getallvideos();
        $data["header"]=$this->headermodel->loadvideos();
        $data["recentexhortation"]=$this->loadpagemodel->getrecentexhortations();
        $data["randompages"]=$this->loadpagemodel->getrandompage();
        $data["parishes"]=$this->homemodel->getparishes();
       $this->load->view('display/videos',$data);
    }

    public function openeventdetail() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["events"]=$this->homemodel->getevents();
        $data["eventdetail"]=$this->loadpagemodel->getevent($this->uri->segment(3));
        $data["header"]=$this->headermodel->loadevent();
        $data["parishes"]=$this->homemodel->getparishes();
       $this->load->view('display/eventdetail',$data);
    }


    public function openvideodetail() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["video"]=$this->loadpagemodel->getvideo($this->uri->segment(3));
        $data["next"]=$this->loadpagemodel->pagination_next($this->uri->segment(3));
        $data["prev"]=$this->loadpagemodel->pagination_prev($this->uri->segment(3));
        $data["header"]=$this->headermodel->loadvideos();
        $data["parishes"]=$this->homemodel->getparishes();
       $this->load->view('display/videodetail',$data);
    }

    public function openmemories() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["carousel"]=$this->homemodel->getcarousel();
        $data["records"]=$this->homemodel->getrecord();
        $data["testimonies"]=$this->homemodel->gettestimonies();
        $data["videos"]=$this->homemodel->getvideos();
        $data["memories"]=$this->homemodel->getmemories();
        $data["donate"]=$this->homemodel->getdonateitems();
        $data["exhortations"]=$this->homemodel->getexhortations();
        $data["events"]=$this->homemodel->getevents();
        $data["memories"]=$this->loadpagemodel->getmemories();
        $data["parishes"]=$this->homemodel->getparishes();
        $data["banner"]=$this->headermodel->getmemories();
       $this->load->view('display/memories',$data);
    }
    public function openexhortations() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["header"]=$this->headermodel->loadexhortation();
        $data["exhortations"]=$this->loadpagemodel->getexhortations();
        $data["parishes"]=$this->homemodel->getparishes();
       $this->load->view('display/exhortations',$data);
    }

    public function serviceondemand() {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["videos"]=$this->loadpagemodel->getvideos();
        $data["header"]=$this->headermodel->loadvideos();
        $data["parishes"]=$this->homemodel->getparishes();
       $this->load->view('display/videos',$data);
    }
    
    public function send() {
    $this->form_validation->set_rules("name", "Name", "required|trim");
    $this->form_validation->set_rules("email", "Email", "required|trim");
    $this->form_validation->set_rules("text", "Subject", "required|trim");
    $this->form_validation->set_rules("message", "Message", "required|trim");
    $this->form_validation->set_rules("message", "Message", "required|trim");
    
    if ($this->form_validation->run() == FALSE) {
        $data["menu"]=$this->homemodel->getpagemenu();
        $data["favicon"]=$this->homemodel->getfavicon();
        $data["info"]=$this->homemodel->getchurchinformation();
        $data["header"]=$this->headermodel->loadcontact();
        $data["parishes"]=$this->homemodel->getparishes();
        $this->load->view("display/contact",$data);
    } else {
        // $config['protocol'] = 'sendmail';
        // $config['mailpath'] = 'C:/wamp64/sendmail';
        // $config['charset'] = 'iso-8859-1';
        // $config['wordwrap'] = TRUE;
        $config['smtp_port']= '80';
        $this->load->library('email',$config);

        $mail_query=$this->db->get("about");
        foreach($mail_query->result() as $row){
            $email=$row->email;
        }

            $this->email->from($this->input->post("email"), $this->input->post("name"));
            $this->email->to($email);
            $this->email->cc($email);
            $this->email->bcc($email);

            $this->email->subject($this->input->post("text"));
            $this->email->message($this->input->post("message"));

            if(!$this->email->send()){
                $data["feedback"]=$this->email->print_debuggger();
                $data["menu"]=$this->homemodel->getpagemenu();
                $data["favicon"]=$this->homemodel->getfavicon();
                $data["info"]=$this->homemodel->getchurchinformation();
                $data["header"]=$this->headermodel->loadcontact();
                $data["parishes"]=$this->homemodel->getparishes();
                $this->load->view("display/contact",$data);
            }else{
                $val["name"] = $this->input->post("name");
                $val["email"] = $this->input->post("email");
                $val["text"] = $this->input->post("text");
                $val["message"] = $this->input->post("message");
        
                $feedback= $this->homemodel->insertmessage($val);
                $data["menu"]=$this->homemodel->getpagemenu();
                $data["favicon"]=$this->homemodel->getfavicon();
                $data["info"]=$this->homemodel->getchurchinformation();
                $data["header"]=$this->headermodel->loadcontact();
                $data["parishes"]=$this->homemodel->getparishes();
                $data["feedback"]=$feedback;
                $this->load->view("display/contact",$data);
            }



       
        }
    
    }
    public function sendrequest() {
        $this->form_validation->set_rules("fname", "First Name", "required|trim");
        $this->form_validation->set_rules("lname", "Last Name", "required|trim");
        $this->form_validation->set_rules("email", "Email", "required|trim");
        $this->form_validation->set_rules("phone", "Phone", "required|trim");
        $this->form_validation->set_rules("request", "Request", "required|trim");
        
        if ($this->form_validation->run() == FALSE) {
            $data["menu"]=$this->homemodel->getpagemenu();
            $data["favicon"]=$this->homemodel->getfavicon();
            $data["info"]=$this->homemodel->getchurchinformation();
            $data["parishes"]=$this->homemodel->getparishes();
            $data["banner"]=$this->headermodel->getabout();
            $data["requestforms"]=$this->homemodel->getrequestforms();
           $this->load->view('display/requestforms',$data);
        } else {
            $category=$this->homemodel->getcategory($this->input->post("id"));
            $val["fname"] = $this->input->post("fname");
            $val["lname"] = $this->input->post("lname");
            $val["phone"] = $this->input->post("phone");
            $val["email"] = $this->input->post("email");
            $val["request_category"] =$category;
            $val["request"] = $this->input->post("request");
    
            $feedback= $this->homemodel->insertrequest($val);
            $data["menu"]=$this->homemodel->getpagemenu();
            $data["favicon"]=$this->homemodel->getfavicon();
            $data["info"]=$this->homemodel->getchurchinformation();
            $data["parishes"]=$this->homemodel->getparishes();
            $data["banner"]=$this->headermodel->getabout();
            $data["requestforms"]=$this->homemodel->getrequestforms();
            $data["feedback"]=$feedback;
           $this->load->view('display/requestforms',$data);
        }
        
        }

        

    



    }

